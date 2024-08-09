<?php

namespace App\Livewire\Admin\Tablas\Gremios;



use App\Models\Empresa;
use App\Models\Gremio;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use Illuminate\Validation\Rule;

class Modal extends Component
{
    public $title;
    public $id;
    public $bg;    
    public $method;
    public $btnText;    
        
    public $gremio;
    public $nombreGremio;
    public $direccionEmpresa;
    public $fechaRegitro;
    public $idResponsable;
    public $direccion;
    public $telefono;
    public $email;
    public $estado=1;
    public $descripcionGremio;

    protected function rules(){
       return [                  
          'nombreGremio' => 'required',                      
        ];          
     }

    protected function messages(){
       return [                      
            "nombreGremio.required" => "Ingrese nombre.",                        
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
          $this->gremio = Gremio::find($this->id);
          $this->nombreGremio = $this->gremio->nombreGremio ;
          $this->title= "Eliminar";
          $this->btnText= "Eliminar";
          $this->bg=	"background-color: rgb(239 68 68)"; 
        }
        if($this->method == "update"){              
              $this->gremio = Gremio::find($this->id);
              
              $this->nombreGremio =  $this->gremio->nombreGremio ;                            
              $this->estado =  $this->gremio->estado ;
              $this->descripcionGremio =  $this->gremio->descripcionGremio;
                                          
              $this->title= "Editar";
              $this->btnText= "Guardar";          
              $this->bg="background-color: rgb(234 88 12)";
            }
                
    }
      

    public function save(){
                  
        $this->validate(  $this->rules(), $this->messages()); 
        
          Gremio::create([
            "nombreGremio"=>$this->nombreGremio,
            "descripcionGremio"=>$this->descripcionGremio,
            "estado"=>$this->estado,
          ]);

          // "idResponsable"=>1,
          $this->dispatch('gremioCreated');   

    }


    public function update(){
                          
      if(!$this->gremio){
        $this->dispatch('gremioNotExits');   
      }            
        else
        {
          $this->validate(  $this->rules(), $this->messages());              
                  
        $this->gremio->nombreGremio= $this->nombreGremio;        
        $this->gremio->estado= $this->estado;
        $this->gremio->descripcionGremio= $this->descripcionGremio;
       
        $this->gremio->save();
        $this->dispatch('gremioUpdated');   
      }
      
    }

    public function delete(){                      

        if(!$this->gremio){
              $this->dispatch('gremioNotExits');   
        }
        else{
          $this->gremio->delete();
          $this->dispatch('gremioDeleted');   
        }
    }



    public function render()
    { 
 

        return view('livewire.admin.tablas.gremios.modal');
    }
}
