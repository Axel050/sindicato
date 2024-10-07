<?php

namespace App\Livewire\Admin\Tablas\Empresas;

use App\Models\Empresa;
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
          
          $localidad = Empresa::find($id);
              if(!$localidad){                  
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


    #[On(['empresaCreated' ,'empresaUpdated' ,'empresaDeleted'] )]
      public function mount(){
        $this->method="";
        $this->resetPage(); 
      }

    public function render(){
      $localidades = Empresa::orderBy("nombreEmpresa", "desc")->paginate(10);

      if($this->query ){
        $localidades =Empresa::where("nombreEmpresa", "like", '%'.$this->query . '%')->orderBy("id","desc")->paginate(10);
      }
                  
        return view('livewire.admin.tablas.empresas.index',compact('localidades'));
    }

  }
