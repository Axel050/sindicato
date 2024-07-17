<?php

namespace App\Livewire\Admin\Usuarios\Usuarios;

use App\Models\Condicione;
use App\Models\Sectore;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

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
        $condicion = User::find($id);        

                if(!$condicion){                  
                  $this->dispatch('userNotExits');   
                }
                else{                  
                  $this->method =$method ;
                  $this->id=$id;  
                }
                
          }

          if($method == "save"){
            $this->method =$method ;
          }

      }


    #[On(['userCreated' ,'userUpdated' ,'userDeleted'] )]
      public function mount(){
        $this->method="";
        $this->resetPage(); 
      }

    public function render()
    {

      $usuarios = User::orderBy("name", "asc")->whereNotIn('idRol', [2, 3])->paginate(10);


      if($this->query ){
        $usuarios =User::where("name", "like", '%'.$this->query . '%')
                            ->whereNotIn('idRol', [2, 3])->orderBy("id","asc")->paginate(10);
      }
          
      

        return view('livewire.admin.usuarios.usuarios.index',compact("usuarios"));
    }
}
