<?php

namespace App\Livewire\Admin\Tablas\Sectores;

use Livewire\Component;
use App\Models\Gremio;
use App\Models\Sectore;
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
        
    public $sector;
    public $nombreSector;    
    public $descripcionSector;    
    public $idResponsable;    
    public $estado=1;

    protected function rules(){
       return [                  
          'nombreSector' => 'required',                      
        ];          
     }

    protected function messages(){
       return [                      
            "nombreSector.required" => "Ingrese nombre.",                        
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
          $this->sector = Sectore::find($this->id);
          $this->nombreSector = $this->sector->nombreSector ;
          $this->title= "Eliminar";
          $this->btnText= "Eliminar";
          $this->bg=	"background-color: rgb(239 68 68)"; 
        }
        if($this->method == "update"){              
              $this->sector = Sectore::find($this->id);
              
              $this->nombreSector =  $this->sector->nombreSector ;                            
              $this->estado =  $this->sector->estado ;
              $this->descripcionSector =  $this->sector->descripcionSector;
                                          
              $this->title= "Editar";
              $this->btnText= "Guardar";          
              $this->bg="background-color: rgb(234 88 12)";
            }
                
    }
      

    public function save(){
                  
        $this->validate(  $this->rules(), $this->messages());              

          Sectore::create([
            "nombreSector"=>$this->nombreSector,            
            "descripcionSector"=>$this->descripcionSector,
            "estado"=>$this->estado,            
            "idResponsable"=>1,            
          ]);        

          $this->dispatch('sectorCreated');   

    }


    public function update(){
                          
      if(!$this->sector){
        $this->dispatch('sectorNotExits');   
      }            
        else
        {
          $this->validate(  $this->rules(), $this->messages());              
                  
        $this->sector->nombreSector= $this->nombreSector;        
        $this->sector->estado= $this->estado;
        $this->sector->descripcionSector= $this->descripcionSector;
       
        $this->sector->save();
        $this->dispatch('sectorUpdated');   
      }
      
    }

    public function delete(){                      

        if(!$this->sector){
              $this->dispatch('sectorNotExits');   
        }
        else{
          $this->sector->delete();
          $this->dispatch('sectorDeleted');   
        }
    }



    public function render()
    { 
 

        return view('livewire.admin.tablas.sectores.modal');
    }
}
