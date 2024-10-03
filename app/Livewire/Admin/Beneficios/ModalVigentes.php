<?php

namespace App\Livewire\Admin\Beneficios;

use App\Models\Beneficio;
use App\Models\BeneficioAfiliado;
use App\Models\Empresa;
use App\Models\EstadoCondicionesRequerida;
use Livewire\Component;
use Carbon\Carbon;


class ModalVigentes extends Component
{

    public $estadoReq;
    public $title;

    public $id;
    public $idMiembro;
    public $idBeneficio;

    public $bg;    
    public $method;
    public $btnText;    
            
    public $nombre;    
    public $beneficio;    

    
    

  
    public function change($id){

      $reque = EstadoCondicionesRequerida::find($id);

      if($reque){
        $estado=$reque->estado ;
          if($estado== 1){
            $reque->estado = 0;
          }elseif($estado== 0){
            $reque->estado = 1;
          }
       $reque->save() ;
      }


// ->where("idBeneficio",$this->idBeneficio)
//                           ->where("idMiembro", $this->idMiembro)


      $total = EstadoCondicionesRequerida::where('idMiembro', $this->idMiembro)
        ->where('idBeneficio', $this->idBeneficio)
        ->count();
            
         
    $conEstado1 = EstadoCondicionesRequerida::where('idMiembro', $this->idMiembro)
        ->where('idBeneficio', $this->idBeneficio)
        ->where('estado', '1')
        ->count();

        if($total === $conEstado1 ){          
            BeneficioAfiliado::create([
              "idAfiliado" => $this->idMiembro,
              "idBeneficio" => $this->idBeneficio,              
            ]);
        }
        elseif($total > $conEstado1){
           $beneficioAfiliado = BeneficioAfiliado::where('idAfiliado', $this->idMiembro)
                                         ->where('idBeneficio', $this->idBeneficio)
                                         ->first();
    
              if ($beneficioAfiliado) {
                    $beneficioAfiliado->delete();
              }

        }

      

    }



    public function mount()
    { 
                                    
      if($this->method == "save"){        
          $this->title= "Crear";
          $this->btnText= "Guardar";
          $this->bg=	"background-color: rgb(22 163 74)";                   
        }
        
        if($this->method == "delete"){
          $this->beneficio = Beneficio::find($this->idBeneficio);
          $this->nombre = $this->beneficio?->nombre;

          $this->title= "Eliminar";
          $this->btnText= "Eliminar";
          $this->bg=	"background-color: rgb(239 68 68)"; 
        }
        if($this->method == "update"){                                                        
              $this->title= "Editar";
              $this->bg="background-color: rgb(234 88 12)";
            }
                
    }
      
        

    public function delete(){                      

        $solicitudes=EstadoCondicionesRequerida::where("idBeneficio",$this->idBeneficio)
        ->where("idMiembro",$this->idMiembro)->get();         

        if(!$solicitudes  ){
              $this->dispatch('solicitudNotExits');   
        }
        else{

          foreach ($solicitudes as $s) {
            $s->delete();
            # code...
          }
          $this->dispatch('solicitudDeleted');   
        }
    }



    
    public function render()
    {

            $beneficios = EstadoCondicionesRequerida::with('beneficio')
                          ->where("idBeneficio",$this->idBeneficio)
                          ->where("idMiembro", $this->idMiembro)
                          ->orderBy("id","desc")
                          ->paginate(15);



        return view('livewire.admin.beneficios.modal-vigentes', compact("beneficios"));
    }
}
