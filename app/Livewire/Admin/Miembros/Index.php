<?php

namespace App\Livewire\Admin\Miembros;

use App\Exports\MiembrosExport;
use App\Models\Empresa;
use App\Models\Gremio;
use App\Models\Sectore;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
  
  use WithPagination;
  public $users;  

  public $selectedColumns=[];  

  public $desdeHijo;  
  public $hastaHijo;     

  public $cantHijosRango;
  public $cantHijos;
  public $cantidad;
  public $cantidadHijos;

  // filter
  public $desde;
  public $hasta;

  public $mesCumple=0;

  public $genero ;

  public $localidades =[];
  public $selectLocalidad;


  public $estado;

  public $fechaAfiliacion;

  public $sectores;
  public $idSector;

  public $empresas;
  public $idEmpresa;

  public $gremios;
  public $idGremio;



  public $conyuge;

  public $fechaNacConyuge;

  public $hijos;
  public $hijosSexo;

  public $fechaRegistro;
  
  
  // endfilter

  public $query,$nombre,$id;
    public $searchField = 'name';
    public $searchType = 'miembro';
  public $method="";    

    
    public function upd( $provincia){
      $this->nombre=  $provincia->nombre;
      $this->method=  "Editar";
    }


    public function updatedSearchField(){          
        $this->query = $this->query;
    }
    public function option($method, $id=false){

      
      if($method == "delete" || $method == "update"){        
        $condicion = User::find($id);        

                if(!$condicion){                  
                  $this->dispatch('userNotExits');   
                }
                else{                  
                  $this->method =$method ;
                  $this->id=$id;  
                }
                
          }

          if($method == "save"){
            $this->method =$method ;
          }

      }

      public function resetRango(){
        $this->desde= null;
        $this->hasta= null ;
          $this->render();
      }

      public function resetRangoHijo(){
        $this->desdeHijo=null;
        $this->hastaHijo = null;

      }

      public function findSector($id){
          if($id){
            return  Sectore::find($id)->nombreSector;
                  }
           return '';
      }

      public function findEmpresa($id){
        if($id){
          return  Empresa::find($id)->nombreEmpresa;
        }
        return '';
      }

      public function findGremio($id){
        if($id){
          return  Gremio::find($id)->nombreGremio;
        }
        return '';
      }

      public function filter(){
        // dd($this->desde);
      //   dd(["desde" => $this->desde,
      // "hasta" => $this->hasta]);
        $this->render();
      }


    #[On(['miembroCreated' ,'miembroUpdated' ,'miembroDeleted'] )]
      public function mount(){
        $this->loadUserPreferences();
        $this->method="";
        $this->resetPage(); 

        $this->localidades = User::distinct()->pluck('localidad')->filter()->toArray(); 

        $this->sectores = Sectore::orderBy("nombreSector", "asc")->get();

        $this->empresas = Empresa::orderBy("nombreEmpresa", "asc")->get();

        $this->gremios = Gremio::orderBy("nombreGremio", "asc")->get();
        
        

        // Log::alert($this->localidades);
         
      }





    public function loadUserPreferences()
    {
        $preference = auth()->user()->columnPreference;

        if ($preference) {
            $this->selectedColumns = json_decode($preference->columns, true);
        }
    }

     public function showColumns()
    {
        $preference = auth()->user()->columnPreference;

        if ($preference) {
            $preference->update(['columns' => json_encode($this->selectedColumns)]);
        } else {
            auth()->user()->columnPreference()->create([
                'columns' => json_encode($this->selectedColumns),
            ]);
        }
    }



       public function getMonthName($monthNumber)
    {
        $months = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        return $months[$monthNumber] ?? '';
    }



    // $miembros = User::where('idRol', [2, 3])->orderBy("id","asc")->get(); 
    // $miembros = $this->users; // Esto debe ser una colección de modelos User
public function exportar()
{
    // $miembros = User::with('hijos')->orderBy('name', 'asc')->whereIn('idRol', [2, 3])->get();
    $miembros = $this->users;
    
    $miembrosFiltrados = $miembros->map(function ($item) {
        $itemArray = collect($item->toArray())->only($this->selectedColumns);
        $itemArray['hijos'] = $item->hijos;  // Añadir relación hijos
        $itemArray['conyuge'] = $item->conyuge;  // Añadir re
        $itemArray['empresa'] = $item->empresa;  // Añadir re
        $itemArray['sector'] = $item->sector;  // Añadir re
        $itemArray['gremio'] = $item->gremio;  // Añadir re
        $itemArray['condicion'] = $item->condicion;  // Añadir re

        return $itemArray;
    });

    $encabezados = $this->selectedColumns;

    $encabezados = array_filter($encabezados, function($encabezado) {
    return $encabezado !== 'accion';
});

    return Excel::download(new MiembrosExport($miembrosFiltrados, $encabezados), 'miembros.xlsx');
}




     private function getEncabezados()
    {
        $columnas = [
            'id' => 'ID',
            'nombre' => 'Nombre Completo',
            'email' => 'Correo Electrónico',
            'created_at' => 'Fecha de Creación',
            // Añade aquí todas las columnas posibles y su encabezado correspondiente
        ];

        return collect($this->selectedColumn)->map(function($columna) use ($columnas) {
            return $columnas[$columna];
        })->toArray();
    }

    public function render()
    {

      
      $usuarios = User::orderBy("name", "asc")->whereIn('idRol', [2, 3]);
      

                  
      
      if ($this->desde !== null && $this->hasta !== null) {
        Log::alert("renderDESEED");
        $desde=$this->desde;
          $hasta=$this->hasta;

          if ($desde  > $hasta ) {
                $temp = $desde;
                $desde = $hasta ;
                $hasta = $temp;
            }
          
          $today = Carbon::today();
          $ageFromDate = $today->copy()->subYears($desde)->endOfDay();
          $ageToDate = $today->copy()->subYears($hasta + 1)->endOfDay();
        
        
        $usuarios->whereBetween('fNac', [ $ageToDate,$ageFromDate]);  
        
    }



    if ($this->mesCumple) {      
        $usuarios = $usuarios->whereMonth('fNac', $this->mesCumple);
    }

    if ($this->genero) {
      $usuarios = $usuarios->where('sexo', $this->genero);
    }

    if ($this->selectLocalidad) {            
        $usuarios = $usuarios->where('localidad', $this->selectLocalidad);
    }


    if ($this->estado === "0" || $this->estado ===  "1") {            
        $usuarios = $usuarios->where('estado', $this->estado);
    }


    if ($this->fechaAfiliacion ) {                
        $usuarios = $usuarios->whereDate('fechaAfiliacion', $this->fechaAfiliacion);
    }

    if ($this->idSector ) {                
        $usuarios = $usuarios->where('idSector', $this->idSector);
    }

    if ($this->idEmpresa ) {                
        $usuarios = $usuarios->where('idEmpresa', $this->idEmpresa);
    }

    if ($this->idGremio ) {                
        $usuarios = $usuarios->where('idGremio', $this->idGremio);
    }

        if ($this->fechaRegistro ) {                
        $usuarios = $usuarios->whereDate('created_at', $this->fechaRegistro);
    }

    if ($this->conyuge) {
        $usuarios = $usuarios->whereHas('conyuge');
    }

    if ($this->fechaNacConyuge) {
              $usuarios = $usuarios->whereHas('conyuge', function ($query)   {
              $query->whereDate('fNac', [ $this->fechaNacConyuge]);                       
          });
    }


    if ($this->hijos) {
        $usuarios = $usuarios->whereHas('hijos');
    }



        // HIJOS SEXO
    if ($this->hijosSexo) {
        $this->cantHijos=0;


        if ($this->desdeHijo !== null || $this->hastaHijo !== null) {
              
              $desde=$this->desdeHijo;
              $hasta=$this->hastaHijo;

              if ($desde  > $hasta ) {
                    $temp = $this->desdeHijo;
                    $desde = $this->hastaHijo;
                    $hasta = $temp;
                }
                      

              $today = Carbon::today();
              $ageFromDate = $today->copy()->subYears($desde)->endOfDay();
              $ageToDate = $today->copy()->subYears($hasta + 1)->endOfDay();
              


              $usuarios = $usuarios->whereHas('hijos', function ($query)  use ($ageFromDate, $ageToDate) {
                  $query->where('sexo', $this->hijosSexo)
                             ->whereBetween('fNac', [ $ageToDate,$ageFromDate]);
                  });
                  

          }
        else {  
                  $usuarios = $usuarios->whereHas('hijos', function ($query) {
                  $query->where('sexo', $this->hijosSexo);
                });
           }
           $this->cantidadHijos =0;
        foreach ($usuarios->get() as $usuario) {
            $this->cantidadHijos += $usuario->hijos()->where('sexo', $this->hijosSexo)->count();    
          }
        
       }
      

       if ($this->desdeHijo !== null || $this->hastaHijo !== null) {
        
          $desde=$this->desdeHijo;
          $hasta=$this->hastaHijo;

          if ($desde  > $hasta ) {
                $temp = $this->desdeHijo;
                $desde = $this->hastaHijo;
                $hasta = $temp;
            }
          
          $this->cantHijosRango=0;
        $this->cantidadHijos =0;
          $today = Carbon::today();
          $ageFromDate = $today->copy()->subYears($desde)->endOfDay();
          $ageToDate = $today->copy()->subYears($hasta + 1)->endOfDay();

        if ($this->hijosSexo){
          Log::alert("jhihihi");

          Log::alert($this->hijosSexo);
          Log::alert("jhihihi");
            $usuarios = $usuarios->whereHas('hijos', function ($query)  use ($ageFromDate, $ageToDate) {
              $query->whereBetween('fNac', [ $ageToDate,$ageFromDate])
                          ->where('sexo', $this->hijosSexo); 
            });                    

                        foreach ($usuarios->get() as $usuario) {
                // $this->cantHijosRango += $usuario->hijos()->whereBetween('fNac', [ $ageToDate,$ageFromDate])->count();    
                $this->cantidadHijos += $usuario->hijos()->whereBetween('fNac', [ $ageToDate,$ageFromDate])
                                                                                    ->where('sexo', $this->hijosSexo)->count();    
              }
        }
        else{          
              Log::alert("EEELSEE");
            $usuarios = $usuarios->whereHas('hijos', function ($query)  use ($ageFromDate, $ageToDate) {
              $query->whereBetween('fNac', [ $ageToDate,$ageFromDate]);                       
            });          
            foreach ($usuarios->get() as $usuario) {
                // $this->cantHijosRango += $usuario->hijos()->whereBetween('fNac', [ $ageToDate,$ageFromDate])->count();    
                $this->cantidadHijos += $usuario->hijos()->whereBetween('fNac', [ $ageToDate,$ageFromDate])->count();    
              }
        }

        
                  
       }






      //  new
      $nombreSon = "secon";
      if ($nombreSon) {
        $this->cantHijos=0;


        if ($this->desdeHijo !== null || $this->hastaHijo !== null) {
                            
              


              $usuarios = $usuarios->whereHas('hijos', function ($query)  use ($nombreSon) {
                  $query->where('nombre', $nombreSon)
                             ;
                  });        

          }              
        
       }
      //  new

Log::alert($this->searchType);
      if($this->query ){
                
        if ($this->searchType == "miembro") {
            $usuarios =$usuarios->where($this->searchField, "like", '%'.$this->query . '%')
                                ->whereIn('idRol', [2, 3])->orderBy("id","asc");          
        }

        elseif ($this->searchType == "hijo") {
          
          $field=$this->searchField;
          if($this->searchField == "name"){
              $field="nombre";
          }

          if($this->searchField == "documento"){
              $field="dni";
          }
          
          
          $usuarios = $usuarios->whereHas('hijos', function ($query) use($field)  {
            $query->where($field, "like", '%'.$this->query . '%');
          });
          
          
        }
        elseif ($this->searchType == "conyuge") {

              $field=$this->searchField;
              if($this->searchField == "name"){
                  $field="nombre";
              }
              $usuarios = $usuarios->whereHas('conyuge', function ($query) use($field)   {
                                  $query->where($field, "like", '%'.$this->query . '%');
                                });          
        }


                
      }


        
      $this->cantidad =  $usuarios->count();
        
        
        // $this->users = $usuarios->with("hijos")->get();
        $this->users = $usuarios->get();
        $usuarios = $usuarios->paginate(15);
            
      

      
      
        return view('livewire.admin.miembros.index',compact("usuarios"));
    }
}
