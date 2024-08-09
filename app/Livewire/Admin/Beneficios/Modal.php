<?php

namespace App\Livewire\Admin\Beneficios;

use App\Models\Beneficio;
use App\Models\Condicione;
use App\Models\CondicionesRequerida;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Spatie\Permission\Models\Role;

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
    public $fechaDesde;
    public $fechaHasta;
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
              $this->nombre = $this->beneficio->nombre;  

              $this->fechaDesde =date('Y-m-d', strtotime($this->beneficio->fechaDesde));
              $this->fechaHasta =date('Y-m-d', strtotime($this->beneficio->fechaHasta)); 
              
              $this->descripcion = $this->beneficio->descripcion;  
              $this->estado = $this->beneficio->estado ;                        
              
              $this->reutilizable = $this->beneficio->reutilizable ? 1 :  0 ;
              $this->cantUsos = $this->beneficio->cantUsos  ;
              
              // $this->conyugue = $this->user->conyuge ? 1 :  0 ;
            
              
                            
              $this->title= "Editar";
              $this->btnText= "Guardar"; 
              $this->bg="background-color: rgb(234 88 12)";
            }

      
     }

     protected function rules(){
       $rules  =  [
            "nombre" => "required",            
          ]; 
           
          return $rules;
        }
        

    protected function messages(){
       return [  
            "name.required" => "Ingrese nombre.", 

          ];                 
      }

    
     public function save(){

    
      $url='';
      // if($request->file("image")){
      if($this->bannerBeneficio){
        $url =  Storage::disk("public")->put("banner", $this->bannerBeneficio);
      }
      

      
      dd([
        "idCondiciones" => $this->idCondiciones,
        "items" => $this->items,
        "imageHas" => $this->imagehas,
        "banne" => $this->bannerBeneficio,
      
        "nombre" =>$this->nombre,
        "fechaHasta" =>$this->fechaDesde,
        "fechaDesde" =>$this->fechaHasta,
        "descripcion" => $this->descripcion,
        "estado" =>$this->estado, 
        "reutilizable" =>$this->reutilizable, 
        "cabtUsos" => $this->cantUsos,
        "bannerBeneficio" => $url,
      ]);

       $this->validate(  $this->rules(), $this->messages()); 
      


        $beneficio = Beneficio::create([
          "nombre" =>$this->nombre,
          "fechaHasta" =>$this->fechaDesde,
          "fechaDesde" =>$this->fechaHasta,

          "descripcion" => $this->descripcion,
          "estado" =>$this->estado, 
          "reutilizable" =>$this->reutilizable, 
          "cabtUsos" => $this->cantUsos,
          "bannerBeneficio" => $url,                               
                    
        ]);

        
        
                
         $this->dispatch("miembroCreated");

      
     }

     public function update(){


      $this->validate(  $this->rules(), $this->messages()); 

      $user=  $this->user ;
      $user->name= $this->name;
      $user->apellido= $this->apellido;
      $user->documento= $this->documento;
      $user->sexo= $this->genero;
      $user->fNac= $this->fechaNac;
      $user->direccion= $this->direccion;      
      $user->telefono= $this->telefono;
      $user->telefonoLaboral= $this->telefonoLaboral;              
      $user->email= $this->email;  
      $user->localidad= $this->localidad;
      $user->fechaAfiliacion= $this->fechaAfiliacion;
      $user->idEmpresa= $this->empresaId;
      $user->idGremio= $this->gremioId;
      $user->idSector= $this->sectorId;
      $user->idCondicion= $this->idCondicion;
      $user->legajo= $this->legajo;
      $user->idRol= $this->idRol;
      $user->estado= $this->estado;
      
     
      $user->save();
      

      $this->dispatch("miembroUpdated");

     }



    public function delete(){
              $idRol = $this->user->idRol;
              $this->user->delete();

              $rol = Role::find($idRol);
              $rolName = $rol->name;
              $this->user->removeRole($rolName);

              $this->user->hijos()->delete();
              $this->user->conyuge()->delete();

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
            'condicion' => $condicion,
            'descripcion' => $this->descripcionReq ,
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


    public function render()
    {
        return view('livewire.admin.beneficios.modal');
    }
}
