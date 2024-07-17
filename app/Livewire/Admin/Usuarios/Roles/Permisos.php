<?php

namespace App\Livewire\Admin\Usuarios\Roles;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Permisos extends Component
{
   
    public $id;
    public $method;
    public $rol;   



     public $modules = [
        [
            'name' => 'Dashboard',
            'ver' => false,
            'crear' => false,
            'actualizar' => false,
            'eliminar' => false,
        ],
        [
            'name' => 'Usuarios',
            'ver' => false,
            'crear' => false,
            'actualizar' => false,
            'eliminar' => false,
        ],        
        [
            'name' => 'Miembros',
            'ver' => false,
            'crear' => false,
            'actualizar' => false,
            'eliminar' => false,
        ],
        [
            'name' => 'Beneficios',
            'ver' => false,
            'crear' => false,
            'actualizar' => false,
            'eliminar' => false,
        ],
        [
            'name' => 'Empresas',
            'ver' => false,
            'crear' => false,
            'actualizar' => false,
            'eliminar' => false,
        ],
        [
            'name' => 'Gremios',
            'ver' => false,
            'crear' => false,
            'actualizar' => false,
            'eliminar' => false,
        ],
        [
            'name' => 'Sectores',
            'ver' => false,
            'crear' => false,
            'actualizar' => false,
            'eliminar' => false,
        ],
        [
            'name' => 'Condiciones',
            'ver' => false,
            'crear' => false,
            'actualizar' => false,
            'eliminar' => false,
        ]
        
        

    ];






    public function mount(){
      $this->rol= Role::find($this->id);      
     $this->initializePermissions();
    }

    public function initializePermissions()
    {
        $permissions = $this->rol->permissions->pluck('name')->toArray();

        foreach ($this->modules as $index => $module) {
            foreach ($module as $action => $enabled) {
                if ($action !== 'name') {
                    $permissionName = strtolower($module['name']) . '-' . $action;
                    $this->modules[$index][$action] = in_array($permissionName, $permissions);
                }
            }
        }
    }


    public function save(){
         $permissions = [];

        foreach ($this->modules as $module) {
            foreach ($module as $action => $enabled) {
                if ($action !== 'name' && $enabled) {
                    $permissions[] = strtolower($module['name']) . '-' . $action;
                }
            }        
          }

        $this->rol->syncPermissions($permissions);
        $this->dispatch("permisosAdded");


    
    }


    public function render()
    {
        return view('livewire.admin.usuarios.roles.permisos');
    }
}
