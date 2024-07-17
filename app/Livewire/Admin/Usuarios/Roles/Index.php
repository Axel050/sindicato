<?php

namespace App\Livewire\Admin\Usuarios\Roles;


use App\Models\Condicione;

use App\Models\Sectore;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
  
  use WithPagination;


  public $query,$nombre,$id;
  public $method="";    

    
    public function upd( $provincia){
      $this->nombre=  $provincia->nombre;
      $this->method=  "Editar";
    }


    public function option($method, $id=false){

    
          if($method == "delete" || $method == "update"){        
        // $sector = Sectore::find($id);        

                // if(!$sector){                  
                //   $this->dispatch('sectorNotExits');   
                // }
                // else{                  
                  $this->method =$method ;
                  $this->id=$id;  
                // }
                
          }

          if($method == "save"){
            $this->method =$method ;
          }

          if($method == "permisos"){
            $this->method =$method ;
            $this->id=$id;  
          }


                
          

          
      }


    #[On(['roleCreated' ,'roleUpdated' ,'roleDeleted','permisosAdded'] )]
      public function mount(){
        $this->method="";
        $this->resetPage(); 
      }

    public function render()
    {

      $roles = Role::orderBy("name", "asc")->paginate(10);


      if($this->query ){
        $roles =Role::where("name", "like", '%'.$this->query . '%')->orderBy("id","asc")->paginate(10);
      }
          
      

        return view('livewire.admin.usuarios.roles.index',compact("roles"));
    }
}
