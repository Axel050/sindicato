<?php

namespace App\Livewire\Admin\PerfilActual;


use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;

class ShowUsuario extends Component
{

    public $title;
    public $id;
    public $bg;    
    public $method;    

    public $user;
    
    public $name;
    public $apellido;
    public $telefono;
    public $email;
    public $password;
    public $password_confirmation;
            
      
    #[On(['UserAdminUpdated'] )]
     public function mount(){
            $this->method="show";    
            $this->title= "Informacion del ";              
            $this->bg="background-color: rgb(22 163 74)"; 
             
            $this->user =  auth()->user();
            $this->name = $this->user->name ;
            $this->apellido = $this->user->apellido ;                            
            $this->telefono = $this->user->telefono ;              
            $this->email = $this->user->email ;              
              
            $this->title= "Informacion del ";              
              $this->bg="background-color: rgb(22 163 74)"; 

      }


            public function option($method){

              $this->method = $method;
              if($method == "show"){
                $this->title= "Informacion del ";              
                $this->bg="background-color: rgb(22 163 74)"; 
              }
              else {
                $this->title= "Editar"; 
                $this->bg="background-color: rgb(234 88 12)"; 
              }

            }
            

      
    

     protected function rules(){
       $rules  =  [            
            'name' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',            
          ]; 
                              
        $rules['email'] = 'required|email|unique:users,email,' . $this->user->id;          

          if ( $this->password) {
                $rules['password'] = 'required|string|confirmed|min:8';
            }          
                        
          return $rules;
        }
        

    protected function messages(){
       return [                      
            "name.required" => "Ingrese nombre.",            
            "apellido.required"=> "Ingrese apellido.",
            "telefono.required"=> "Ingrese telefono.",
            "email.required"=> "Ingrese mail.", 
            'email.email' => 'Ingrese un mail válido.',
            'email.unique' => 'Mail existente.',            
            "password.required"=> "Ingrese clave.",
            "password.confirmed"=> "Las claves no coinciden.",            
            "password.min"=> "Debe tener al menos 8 caracteres.",                                    
          ];                 
    }

         

     public function edit(){


      $this->validate(  $this->rules(), $this->messages()); 

      $user=  $this->user ;
      $user->name= $this->name;
      $user->apellido= $this->apellido;      
      $user->telefono= $this->telefono;      
      $user->email= $this->email;            
      
      if($this->password){
        $user->password= bcrypt($this->password);
      }
      
      $user->save();
      
      $this->dispatch("UserAdminUpdated");
     }
     

    public function render()
    {
        return view('livewire.admin.perfil-actual.show-usuario');
    }
}
