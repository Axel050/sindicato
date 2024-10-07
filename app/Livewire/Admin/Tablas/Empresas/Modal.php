<?php

namespace App\Livewire\Admin\Tablas\Empresas;

use App\Models\Empresa;
use Livewire\Component;
use Carbon\Carbon;

class Modal extends Component
{
    public $title;
    public $id;
    public $bg;    
    public $method;
    public $btnText;    
        
    public $empresa;
    public $nombreEmpresa;
    public $direccionEmpresa;
    public $fechaRegitro;
    public $idResponsable;
    public $direccion;
    public $telefono;
    public $email;
    public $estado=1;
    public $descripcionEmpresa;

    protected function rules(){
       return [                  
          'nombreEmpresa' => 'required',          
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',                    
        ];          
     }

    protected function messages(){
       return [                      
            "nombreEmpresa.required" => "Ingrese nombre.",            
            "direccion.required"=> "Ingrese direccion.",
            "telefono.required"=> "Ingrese telefono.",
            "email.required"=> "Ingrese mail.",          
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
            $this->empresa = Empresa::find($this->id);
            $this->nombreEmpresa = $this->empresa->nombreEmpresa ;
            $this->title= "Eliminar";
            $this->btnText= "Eliminar";
            $this->bg=	"background-color: rgb(239 68 68)"; 
        }
        if($this->method == "update"){              
              $this->empresa = Empresa::find($this->id);              
              $this->nombreEmpresa =  $this->empresa->nombreEmpresa ;              
              $this->direccion =  $this->empresa->direccion ;
              $this->telefono =  $this->empresa->telefono ;
              $this->email =  $this->empresa->email ;
              $this->estado =  $this->empresa->estado ;
              $this->descripcionEmpresa =  $this->empresa->descripcionEmpresa;
                                          
              $this->title= "Editar";
              $this->btnText= "Guardar";          
              $this->bg="background-color: rgb(234 88 12)";
            }
                
    }
      

    public function save(){
                  
        $this->validate(  $this->rules(), $this->messages());              

          Empresa::create([
            "nombreEmpresa"=>$this->nombreEmpresa,
            "direccion"=>$this->direccion,
            "telefono"=>$this->telefono,
            "email"=>$this->email,
            "descripcionEmpresa"=>$this->descripcionEmpresa,
            "estado"=>$this->estado,
            "fechaRegistro"=>Carbon::now('America/Argentina/Buenos_Aires'),
            "idResponsable"=>1,            
          ]);        

          $this->dispatch('empresaCreated');   
    }

    public function update(){
                          
      if(!$this->empresa){
        $this->dispatch('provinciaNotExits');   
      }            
        else
        {
          $this->validate(  $this->rules(), $this->messages());              
                  
        $this->empresa->nombreEmpresa= $this->nombreEmpresa;
        $this->empresa->direccion= $this->direccion;
        $this->empresa->email= $this->email;
        $this->empresa->estado= $this->estado;
        $this->empresa->descripcionEmpresa= $this->descripcionEmpresa;
       
        $this->empresa->save();
        $this->dispatch('empresaUpdated');   
      }
      
    }

    public function delete(){                      

        if(!$this->empresa){
              $this->dispatch('empresaNotExits');   
        }
        else{
          $this->empresa->delete();
          $this->dispatch('empresaDeleted');   
        }
    }


    public function render()
    { 

        return view('livewire.admin.tablas.empresas.modal');
    }
}
