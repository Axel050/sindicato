<?php

namespace App\Livewire\Admin\Usuarios\Roles;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
// use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class Modal extends Component
{
  
        //   $role->givePermissionTo($permission);
        //   $role->syncPermissions($permission);
        // $permission->assignRole($role);
        // $permission->syncRoles([$role,$role2]);


        // $user->roles()->sync($req->roles);
        // Route::get('/usuarios',[SideMenuController::class, "usuarios"])->middleware('can:admin.home)->name('usuarios');
        // o en controller         
      //    public functino __contruct(){
          // $this->middleware('can:admin.categories.edit')->only('destroy');
      // }

    public $title;
    public $id;
    public $bg;    
    public $method;
    public $btnText;    

    // public $roleName;
    // public $permissions = [];
    // public $availablePermissions;

    public $rol;
    public $name;
    public $description;
    public $status=0;

    
    public function mount()
    {
    
        // $this->availablePermissions = Permission::all();

        if($this->method == "save"){        
          $this->title= "Crear";
          $this->btnText= "Guardar";
          $this->bg=	"background-color: rgb(22 163 74)";                   
        }
        
        if($this->method == "delete"){

          $this->rol = Role::find($this->id);
          $this->name = $this->rol->name ;

          $this->title= "Eliminar";
          $this->btnText= "Eliminar";
          $this->bg=	"background-color: rgb(239 68 68)"; 
        }
        if($this->method == "update"){              
              $this->rol = Role::find($this->id);
              $this->name = $this->rol->name ;                            
              $this->description = $this->rol->description ;
              $this->status = $this->rol->status ;
              
              $this->title= "Editar";
              $this->btnText= "Guardar";          
              $this->bg="background-color: rgb(234 88 12)";
            }

    }

    // public function createRole()
    // {
    //     $role = Role::create(['name' => $this->roleName]);
    //     $role->syncPermissions($this->permissions);
    //     $this->reset(['roleName', 'permissions']);
    //     session()->flash('message', 'Role created successfully.');
    // }


    public function save(){
        $this->validate([
          "name"=>"required|unique:roles",
        ],
        [
           "name.required"=>"Ingrese nombre",
           "name.unique"=>"Nombre existente.",
      ]);


        Role::create([
          "name" =>$this->name,
          "guard_name" => "web",
          "description" => $this->description,
          "status" => $this->status,
        ]);
        
        $this->dispatch("roleCreated");
    }

    public function update(){
        $this->validate([
          "name"=>"required",
        ],
        [ "name.required"=>"Ingrese nombre"]);

          $this->rol->name=$this->name;
          $this->rol->description=$this->description;
          $this->rol->status=$this->status;
          $this->rol->save();
    
        $this->dispatch("roleUpdated");

    }

    
    
    public function delete(){
      
      $rol=Role::find($this->id);        
      $rol->delete();
      
      $this->dispatch("roleDeleted");
    }




    public function render()
    {
        return view('livewire.admin.usuarios.roles.modal' ,[
            'roles' => Role::with('permissions')->get()
        ]);
    }
}
