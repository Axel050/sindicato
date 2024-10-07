<?php

namespace App\Livewire\Admin\Usuarios\Usuarios;

use App\Models\Gremio;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Modal extends Component
{    

    public $title;
    public $id;
    public $bg;    
    public $method;
    public $btnText;    

    public $user;

    public $name;
    public $apellido;    
    public $email;    
    public $telefono;    
    public $tipos=[];
    public $gremios=[];
    public $idGremio;
    public $idRol;
    public $estado=0;
    public $password;
    public $password_confirmation;


    public function mount(){
      
      $this->tipos = Role::orderBy('name', 'asc')->get();
      $this->gremios = Gremio::orderBy('nombreGremio', 'asc')->get();

       if($this->method == "save"){        
          $this->title= "Crear";
          $this->btnText= "Guardar";
          $this->bg=	"background-color: rgb(22 163 74)";                   
        }
        
        if($this->method == "delete"){
          $this->user = User::find($this->id);
          $this->name = $this->user->name ;                    

          $this->title= "Eliminar";
          $this->btnText= "Eliminar";
          $this->bg=	"background-color: rgb(239 68 68)"; 
        }
        if($this->method == "update"){              
              $this->user = User::find($this->id);
              $this->name = $this->user->name ;
              $this->apellido = $this->user->apellido ;
              $this->telefono = $this->user->telefono ;
              $this->email = $this->user->email ;
              $this->estado = $this->user->estado ;
              $this->idRol = $this->user->idRol ;
              $this->idGremio = $this->user->idGremio ;
              
              $this->title= "Editar";
              $this->btnText= "Guardar";
              $this->bg="background-color: rgb(234 88 12)";
            }

        }



     protected function rules(){
       $rules  =  [                  
            'name' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'idRol' => 'required',         
            'idGremio' => 'required',         
          ]; 
          
          if($this->method == "update"){            
            $rules['email'] = 'required|email|unique:users,email,' . $this->user->id;
            if ( $this->password) {
            $rules['password'] = 'required|string|confirmed|min:8';
          }
          }

          elseif($this->method == "save"){  
            $rules['email'] = 'required|email|unique:users';
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
            "idRol.required"=> "Elijo un tipo.",
            "idGremio.required"=> "Elijo un sindicato.",
            "password.required"=> "Ingrese clave.",
            "password.confirmed"=> "Las claves no coinciden.",            
            "password.min"=> "Debe tener al menos 8 caracteres.",            
          ];                 
      }
    

      public function save(){
                  
        $this->validate(  $this->rules(), $this->messages());              

      
          $user = User::create([
              "name" =>$this->name,
              "apellido" =>$this->apellido,
              "telefono" =>$this->telefono,
              "email" =>$this->email,
              "idRol" =>$this->idRol,
              "idGremio" =>$this->idGremio,
              "estado" =>$this->estado,
              'password' => bcrypt($this->password),
          ]);
          
          
          $role = Role::find($this->idRol);
          $roleName= $role->name;
          
          $user->assignRole($roleName);
          
          $this->dispatch("userCreated");
          
      }

        
        
        public function update(){            
                    
          $this->validate(  $this->rules(), $this->messages()); 

          $this->user->name= $this->name;
          $this->user->apellido= $this->apellido;
          $this->user->telefono= $this->telefono;
          $this->user->email= $this->email;
          $this->user->idRol= $this->idRol;
          $this->user->idGremio= $this->idGremio;
          $this->user->estado= $this->estado;
          
          if($this->password){
            $this->user->password= bcrypt($this->password);
          }
          $this->user->save();

          $role = Role::find($this->idRol);
          $roleName= $role->name;
          
          $this->user->syncRoles($roleName);
          // $this->user->assignRole($roleName);
        
          $this->dispatch("userUpdated");
        }

        public function delete(){
             $idRol = $this->user->idRol;
              $this->user->delete();
              $rol = Role::find($idRol);
              $rolName = $rol->name;

              $this->user->removeRole($rolName);
              $this->dispatch("userDeleted");
        }
        
        public function render()
        {
          return view('livewire.admin.usuarios.usuarios.modal');
        }
}
