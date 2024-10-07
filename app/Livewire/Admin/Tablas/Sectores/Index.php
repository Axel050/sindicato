<?php

namespace App\Livewire\Admin\Tablas\Sectores;

use App\Models\Sectore;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{  
  use WithPagination;

  public $query,$nombre,$id;
  public $method="";    

    public function option($method, $id=false){
      
      if($method == "delete" || $method == "update"){        
        $sector = Sectore::find($id);        
          if(!$sector){                  
            $this->dispatch('sectorNotExits');   
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


    #[On(['sectorCreated' ,'sectorUpdated' ,'sectorDeleted'] )]
      public function mount(){
        $this->method="";
        $this->resetPage(); 
      }

    public function render(){

      $sectores = Sectore::orderBy("nombreSector", "asc")->paginate(10);

      if($this->query ){
        $sectores =Sectore::where("nombreSector", "like", '%'.$this->query . '%')->orderBy("id","asc")->paginate(10);
      }
          
        return view('livewire.admin.tablas.sectores.index', compact("sectores"));
    }
}
