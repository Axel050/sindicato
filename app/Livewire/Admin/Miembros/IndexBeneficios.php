<?php

namespace App\Livewire\Admin\Miembros;

use Livewire\Attributes\Url;

use App\Models\BeneficioAfiliado;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexBeneficios extends Component

{  
  use WithPagination;


    public $query,$nombre,$nombreM;
  
    public $id;

    public $idMiembro= '';
  

   public $method="";    
   public $administrar="";    

    


    public function option($method, $id=false){

      
      if($method == "delete" || $method == "update"){        
        $condicion = BeneficioAfiliado::find($id);        

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

          if($method == "administrar"){
            $this->administrar =true ;
            $this->id=$id;  
          }

      }


      
      public function mount(){
        $this->idMiembro =request()->route('id');
        
        $this->nombreM = User::find($this->idMiembro)->name;        

        if(request()->route('idB'))
        {
          $this->id= request()->route('idB');
          $this->administrar=true;
        }
      }
      
      #[On(['miembroCreated' ,'miembroUpdated' ,'miembroDeleted'] )]
      public function render2(){
      $this->method="";
      $this->resetPage(); 
      }


    public function render()
    {
      
      

      $beneficios = BeneficioAfiliado::where("idAfiliado",$this->idMiembro)->with('beneficio') ->paginate(15);

      if ($this->query) {
          $beneficios = BeneficioAfiliado::where("idAfiliado", $this->idMiembro)
              ->whereHas('beneficio', function($query) {
                  $query->where("nombre", "like", '%' . $this->query . '%');
              })
              ->with('beneficio') 
              ->orderBy("id", "asc")
              ->paginate(15);
      }
  
    
        return view('livewire.admin.miembros.index-beneficios', compact("beneficios"));
    }
}
