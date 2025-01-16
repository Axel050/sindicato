<?php

namespace App\Livewire\Admin\Guest;

use App\Models\CondicionesRequerida;
use App\Models\EstadoCondicionRequeridaAfiliado;
use App\Models\Gremio;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Requerimientos extends Component
{
  
  use WithPagination;  

  public $query,$nombre,$id;
  public $method="";    

  public $idAfi;    
  // public $idCond;    
        


    public function option($method, $idConAfi=null,$idCondReq=null){
                    
            if(!$idConAfi){              
              // Sin no existe lo creamos , y pasamos el id al modeal para mostar poder cargar los datos
              $estadoC  = EstadoCondicionRequeridaAfiliado::create([
                "idCondicionReq"=> $idCondReq,
                "idMiembro"=> $this->idAfi,
                "estado"=> 0,
                "fechaRegistro"=> Carbon::now()->format('Y-m-d'),
                "idResponsable"=> 1,                                
              ]);


              $idConAfi = $estadoC->id;
            }
            
          
            $this->method =$method ;
            $this->id=$idConAfi;  
                      

      }


    #[On(['condicionReqUpdated' ,'gremioUpdated' ,'gremioDeleted'] )]
      public function mount(){
        $this->idAfi= auth()->user()->id;
        $this->method="";
        $this->resetPage(); 
      }

    public function render(){
      $requerimientos = CondicionesRequerida::orderBy("nombreRequerimiento", "desc")->paginate(10);

      if($this->query ){
        $requerimientos =CondicionesRequerida::where("nombreRequerimiento", "like", '%'.$this->query . '%')->orderBy("id","desc")->paginate(10);
      }                  

        return view('livewire.admin.guest.requerimientos',compact('requerimientos'));
        
    }
}
