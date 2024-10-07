<?php

namespace App\Livewire\Admin\Tablas\Condiciones;

use App\Models\Condicione;
use Livewire\Component;
use Carbon\Carbon;

class Modal extends Component
{
    public $title;
    public $id;
    public $bg;    
    public $method;
    public $btnText;    
        
    public $condicion;
    public $nombreCondicion;    
    public $descripcionCondicion;    
    public $idResponsable;    
    public $estado=1;

    protected function rules(){
       return [                  
          'nombreCondicion' => 'required',                      
        ];          
     }

    protected function messages(){
       return [                      
            "nombreCondicion.required" => "Ingrese nombre.",                        
          ];                 
      }
    
    

  
    public function mount()
    { 
                                    
      if($this->method == "save"){        
          $this->title= "Crear";
          $this->btnText= "Guardar";
          $this->bg=	"background-color: rgb(22 163 74)";                   
        }
        
        if($this->method == "delete"){
          $this->condicion = Condicione::find($this->id);
          $this->nombreCondicion = $this->condicion->nombreCondicion ;
          $this->title= "Eliminar";
          $this->btnText= "Eliminar";
          $this->bg=	"background-color: rgb(239 68 68)"; 
        }
        if($this->method == "update"){              
              $this->condicion = condicione::find($this->id);
              
              $this->nombreCondicion =  $this->condicion->nombreCondicion ;                            
              $this->estado =  $this->condicion->estado ;
              $this->descripcionCondicion =  $this->condicion->descripcionCondicion;
                                          
              $this->title= "Editar";
              $this->btnText= "Guardar";          
              $this->bg="background-color: rgb(234 88 12)";
            }
                
    }
      

    public function save(){
                  
        $this->validate(  $this->rules(), $this->messages());              
        $id = auth()->user()->id;
        
          Condicione::create([
            "nombreCondicion"=>$this->nombreCondicion,            
            "descripcionCondicion"=>$this->descripcionCondicion,
            "estado"=>$this->estado,
            "idResponsable"=>$id, 
            "fechaRegistro"=>Carbon::now('America/Argentina/Buenos_Aires'),
          ]);        


          $this->dispatch('condicionCreated');   

    }


    public function update(){
                          
      if(!$this->condicion){
        $this->dispatch('condicionNotExits');   
      }            
        else
        {
          $this->validate(  $this->rules(), $this->messages());              
                  
        $this->condicion->nombreCondicion= $this->nombreCondicion;        
        $this->condicion->estado= $this->estado;
        $this->condicion->descripcionCondicion= $this->descripcionCondicion;
       
        $this->condicion->save();
        $this->dispatch('condicionUpdated');   
      }
      
    }

    public function delete(){                      

        if(!$this->condicion){
              $this->dispatch('condicionNotExits');   
        }
        else{
          $this->condicion->delete();
          $this->dispatch('condicionDeleted');   
        }
    }



    public function render()
    { 
 

        return view('livewire.admin.tablas.condiciones.modal');
    }
}
