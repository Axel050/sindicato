<?php

namespace App\Livewire\Admin\Beneficios;

use App\Models\Beneficio;
use App\Models\BeneficioCondicion;
use App\Models\Condicione;
use App\Models\CondicionesRequerida;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile as SupportFileUploadsTemporaryUploadedFile;
use Livewire\Features\SupportFileUploads\WithFileUploads;



class Modal extends Component
{

  use WithFileUploads;

     public $items = [];

    public $title;
    public $id;
    public $bg;    
    public $method;
    public $btnText;    

    public $beneficio;    

    public $imagehas;    
  
    public $idRol;

    public $nombre;
    public $fechaDesde=null;
    public $fechaHasta=null;
    public $descripcion;
    public $estado=1;
    public $reutilizable=0;
    public $cantUsos=1;
    public $bannerBeneficio;

    public $membresias =[];
    public $condiciones;
    public $idCondiciones=[];
    public $idCondicion;    
  
    public $condicionesReq;
    public $idCondicionReq;
    public $descripcionReq;
  
      
     public function mount()
     {       
      $this->condiciones=Condicione::orderBy("nombreCondicion","asc")->get();
      $this->condicionesReq=CondicionesRequerida::orderBy("nombreRequerimiento","asc")->get();

      if($this->method == "save"){        
          $this->title= "Crear";
          $this->btnText= "Guardar";
          $this->bg=	"background-color: rgb(22 163 74)";
        }
        
        if($this->method == "delete"){
          $this->beneficio = Beneficio::find($this->id);
          $this->nombre = $this->beneficio->nombre;  

          $this->title= "Eliminar";
          $this->btnText= "Eliminar";
          $this->bg=	"background-color: rgb(239 68 68)"; 
        }

        if($this->method == "update"){              
              $this->beneficio = Beneficio::find($this->id);

              $isItems=$this->beneficio->beneficioCondiciones;

              foreach ($isItems as $item ) {
                $this->items[]=[
                  'idcondicion' => $item->idCondicion,
                  'descripcion' => $item->descripcion ,
                  // 'condicion' => $item->condicion?->nombreRequerimiento,               
                  'condicion' => $item->condicionReq?->nombreRequerimiento,               
                ];
              }

              $this->nombre = $this->beneficio->nombre;  

              $condicionesGuardadas = explode('-', $this->beneficio->condiciones); 
              
              $this->idCondiciones = $condicionesGuardadas;  
              
              if($this->beneficio->fechaDesde){
                $this->fechaDesde =date('Y-m-d', strtotime($this->beneficio->fechaDesde));
              }

            if($this->beneficio->fechaHasta){
                $this->fechaHasta =date('Y-m-d', strtotime($this->beneficio->fechaHasta)); 
            }
              
              $this->descripcion = $this->beneficio->descripcion;  
              $this->estado = $this->beneficio->estado ;                        
              
              $this->reutilizable = $this->beneficio->reutilizable ? 1 :  0 ;
              $this->cantUsos = $this->beneficio->cantUsos  ;                                        
              $this->bannerBeneficio = $this->beneficio->bannerBeneficio  ; 
              
                            
              $this->title= "Editar";
              $this->btnText= "Guardar"; 
              $this->bg="background-color: rgb(234 88 12)";
            }

      
     }

     protected function rules(){
       $rules  =  [
            "nombre" => "required",           
             "items" => "required|array|min:1",  
          ]; 
           
          return $rules;
        }
        

    protected function messages(){
       return [  
            "name.required" => "Ingrese nombre.", 
             "items.required" => "Debe agregar al menos una condición.", 

          ];                 
      }

    
     public function save(){
      

      $url='';
      if($this->bannerBeneficio){
        
        $url =  Storage::disk("public")->put("banner", $this->bannerBeneficio);
      }
      
      
      $condiciones = implode('-', $this->idCondiciones);

       $this->validate(  $this->rules(), $this->messages()); 
      
        $beneficio = Beneficio::create([
          "nombre" =>$this->nombre,
          "descripcion" => $this->descripcion,
          "fechaCreacion" =>now(),
          "fechaRegistro" =>now(),
          "idResponsable" => 1,
          "fechaDesde" =>$this->fechaHasta,
          "fechaHasta" =>$this->fechaDesde,
          "estado" =>$this->estado, 
          "reutilizable" =>$this->reutilizable, 
          "cantUsos" => $this->cantUsos,
          "nroBeneficio" => 1,   
          "condiciones" => $condiciones ,
          "bannerBeneficio" => $url,                                   
        ]);

        
        if($beneficio){
                  foreach ($this->items as $condicion) {            
                    
                    BeneficioCondicion::create([        
                      'idBeneficio' => $beneficio->id,
                      'idCondicion' => $condicion['idcondicion'],
                      'descripcion' => $condicion['descripcion'],
                      'fechaRegistro' => now(),
                      'idResponsable' => 1,
                      'estado' => 1,
                    ]);
                  }
                }
                                
        
                
         $this->dispatch("miembroCreated");

      
     }

     public function update(){

      $this->validate( $this->rules(), $this->messages() ); 

      $url='';

         if ($this->bannerBeneficio instanceof SupportFileUploadsTemporaryUploadedFile ) {
           $url = Storage::disk("public")->put("banner", $this->bannerBeneficio);          
         }
        
        
      
      $condiciones = implode('-', $this->idCondiciones);

      $this->beneficio->nombre  = $this->nombre;
      $this->beneficio->descripcion  = $this->descripcion;

      $this->beneficio->fechaDesde  = $this->fechaDesde ;      
      $this->beneficio->fechaHasta  = $this->fechaHasta;


      $this->beneficio->estado  = $this->estado ;
      $this->beneficio->reutilizable  = $this->reutilizable;
      $this->beneficio->cantUsos = $this->cantUsos;
      $this->beneficio->condiciones  = $condiciones;
      if ($url) {        
        $this->beneficio->bannerBeneficio  = $url;      
      }
     
      $this->beneficio->save();

      $this->updateBeneficioCondiciones($this->beneficio->id);
      
      $this->dispatch("miembroUpdated");

     }


    public function delete(){
              
              $beneficio = $this->beneficio;
              $this->beneficio->delete();

              $beneficio->beneficioCondiciones()->delete();
              
              // $this->user->hijos()->delete();
              // $this->user->conyuge()->delete();

              $this->dispatch("miembroDeleted");
        }


    public function addItem()
    {

      $this->validate([
        'idCondicionReq' => 'required',            
      ],
      ["idCondicionReq.required" => "Elija condicion"
      ]
    );
    
    $condicion = CondicionesRequerida::find($this->idCondicionReq)->nombreRequerimiento;
    
    $this->items[] = [
      'idcondicion' => $this->idCondicionReq,
      'descripcion' => $this->descripcionReq ,
      'condicion' => $condicion,
    ];
    
    // Clear the inputs
    $this->idCondicionReq = '';
    $this->descripcionReq = '';

    }

      public function removeItem($index)
    {

      
        unset($this->items[$index]);
        $this->items = array_values($this->items);

    }


     public function updateBeneficioCondiciones($beneficioId)
{
    
    $beneficio = Beneficio::find($beneficioId);

  // Obtener las condiciones actuales en la base de datos
  $condicionesActuales = $beneficio->beneficioCondiciones->pluck('idCondicion')->toArray();


foreach ($this->items as $condicion) {
    if (!in_array($condicion['idcondicion'], $condicionesActuales)) {
        // Crear nueva condición si no existe en la base de datos
        $beneficio->beneficioCondiciones()->create([            
            'idCondicion' => $condicion['idcondicion'],
            'descripcion' => $condicion['descripcion'],
            'fechaRegistro' => now(),
            'idResponsable' => 1,
            'estado' => 1,
        ]);
    }
}


$condicionesEnviadas = array_column($this->items, 'idcondicion');

// Eliminar condiciones que ya no están presentes en el formulario
  $beneficio->beneficioCondiciones()
      ->whereNotIn('idCondicion', $condicionesEnviadas)
      ->delete();
      
  }

            


    public function render()
    {
        return view('livewire.admin.beneficios.modal');
    }
}
