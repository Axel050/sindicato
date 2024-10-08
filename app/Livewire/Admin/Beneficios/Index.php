<?php

namespace App\Livewire\Admin\Beneficios;

use App\Models\Beneficio;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
  
  use WithPagination;

  public $query,$nombre,$id;
  public $method="";    
  public $filter="all";    
    
    public function option($method, $id=false){
      
      if($method == "delete" || $method == "update"){        
        $condicion = Beneficio::find($id);        
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

    #[On(['miembroCreated' ,'miembroUpdated' ,'miembroDeleted'] )]
      public function mount(){
        $this->method="";
        $this->resetPage(); 
      }

    public function render(){

      $beneficios = Beneficio::orderBy("nombre", "asc");

      if($this->query ){
        $beneficios =Beneficio::where("nombre", "like", '%'.$this->query . '%');                            
      }

      if(request()->route('inactivos') == "inactivos"){
          $this->filter="0";
        }

       if ($this->filter === "0" || $this->filter === "1" ) {
        $beneficios->where("estado", $this->filter);  
      }

        $beneficios = $beneficios->paginate(15);
                        
        return view('livewire.admin.beneficios.index',compact("beneficios"));
    }
}
