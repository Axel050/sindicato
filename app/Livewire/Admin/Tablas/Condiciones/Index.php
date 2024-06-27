<?php

namespace App\Livewire\Admin\Tablas\Condiciones;

use App\Models\Condicione;
use App\Models\Sectore;
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
        $condicion = Condicione::find($id);        

                if(!$condicion){                  
                  $this->dispatch('condicionNotExits');   
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


    #[On(['condicionCreated' ,'condicionUpdated' ,'condicionDeleted'] )]
      public function mount(){
        $this->method="";
        $this->resetPage(); 
      }

    public function render()
    {

      $condiciones = Condicione::orderBy("nombreCondicion", "asc")->paginate(10);


      if($this->query ){
        $condiciones =Condicione::where("nombreCondicion", "like", '%'.$this->query . '%')->orderBy("id","asc")->paginate(10);
      }
          


        return view('livewire.admin.tablas.condiciones.index', compact("condiciones"));
    }
}

    