<?php

namespace App\Livewire\Admin\Tablas\Gremios;

use App\Models\Gremio;
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
          $gremio = Gremio::find($id);    
          if(!$gremio){                  
            $this->dispatch('paisNotExits');   
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


    #[On(['gremioCreated' ,'gremioUpdated' ,'gremioDeleted'] )]
      public function mount(){
        $this->method="";
        $this->resetPage(); 
      }

    public function render(){
      $gremios = Gremio::orderBy("nombreGremio", "desc")->paginate(10);

      if($this->query ){
        $gremios =Gremio::where("nombreGremio", "like", '%'.$this->query . '%')->orderBy("id","desc")->paginate(10);
      }                  

        return view('livewire.admin.tablas.gremios.index',compact('gremios'));
    }
  }
