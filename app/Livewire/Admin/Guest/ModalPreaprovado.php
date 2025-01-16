<?php

namespace App\Livewire\Admin\Guest;

use Livewire\Component;
use App\Models\Beneficio;
use App\Models\BeneficioAfiliado;
use App\Models\EstadoCondicionesRequerida;
use App\Models\EstadoCondicionRequeridaAfiliado;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ModalPreaprovado extends Component
{

  use WithFileUploads;
  
  
  public $method;  
  public $id;
  public $idbeneficio;    
  
  public $title;
  public $bg;    
  public $btnText;    
  public $text;    
  
  public $beneficio;   
  
  public $be;    
  
  
  #[On(['condicionReqUpdated' ,'gremioUpdated' ,'gremioDeleted'] )]
  public function mount()
  {
    
      $ben= Beneficio::find($this->idbeneficio); 

      if($ben){

        
        $this->beneficio= $ben;
        $beneficios = $ben->beneficioCondiciones;
        
        $this->beneficio= $ben;
        $this->be = $ben->beneficioCondiciones->toArray();       
      
        if($this-> method=="create"){          
          $this->title= "Solicitud";          
          $this->btnText= "Solicitar";
          $this->text= "activar";
          
          $this->bg=	"background-color: rgb(22 163 74)";  
        }elseif($this->method == "delete"){
          $this->title= "Cancelar";
          $this->btnText= "Cancelar";
          $this->text= "cancelar la solicitud a";
          $this->bg="background-color: rgb(234 88 12)";
          
        }
      }
      
        
     }


     
     public function create(){

      $benef= Beneficio::find($this->idbeneficio); 
      $beneficiosC = $benef->beneficioCondiciones;
      $estado=0;
      $estadosOk=1;
      $estadosCant=0;
      $valor=null;
      
      
        // foreach ($beneficiosC as $ben) {


        //         // Verificamos documentacion 
        //           $e= EstadoCondicionesRequerida::where("idMiembro" ,$this->id)->where("idCondicionRequerida",$ben->idCondicion)->first();
                  
        //           Log::alert($e->estado);
        //           // Si alguno no es estado=1 , no se crea el beneficioafiliado,estadosOk
        //             if(isset($e->estado)){                      
        //               $estadosCant++;

        //                 if($e->estado == 1 ){
        //                   $estado = 1;                          
        //                 } 
        //                 elseif($e->estado == 2 ){
        //                   $estado=2;
        //                   $estadosOk=null;
        //                 } 
        //                 elseif($e->estado == 0 ){
        //                   $estado=0;
        //                   $estadosOk=null;                          
        //                 }
                        
        //             }
                        
        //                 // Si esta todo OK , se crea el beneficio afiliado 

        //                 $eCR= EstadoCondicionesRequerida::where("idMiembro" ,$this->id)->where("idCondicionRequerida",$ben->idCondicion)->where("idBeneficio",$this->idbeneficio)->first();
                        
        //                 if($eCR){                          
        //                     $eCR->estado=1;
        //                     $eCR->save();
        //                 }else{                  

        //                     EstadoCondicionesRequerida::create([
        //                       "idCondicionRequerida" => $ben->idCondicion,
        //                       "idBeneficio" => $benef->id,
        //                       "idMiembro" => $this->id,
        //                       "estado" => $estado,
        //                       "fechaRegistro" => now(),
        //                       "idResponsable" => 1
        //                     ]);
        //                   }


        //             }
                 
                  
                        // dd([
                        //   "estados" => $estadosOk,
                        //   "bencicion can" => $beneficiosC->count(),
                        //   "estadosCa" => $estadosCant,

                        // ]);
      
                  // if($estadosOk && $beneficiosC->count() ==  $estadosCant){
                    $beneficioMiembro = BeneficioAfiliado::create([
                    "idBeneficio" =>$benef->id,                              
                    "idAfiliado" =>$this->id,
                                                
                    "fechaRegistro" =>now(),
                    "idResponsable" =>1,
                    "estado"=>1,
                  
                    "comentario" =>null,
                    "fechaDesde" =>$benef->fechaDesde,
                    "fechaHasta" =>$benef->fechaHasta,
                    // "fechaDesde" =>$ben->fechaDesde,
                    // "fechaHasta" =>$ben->fechaHasta,
                    
                    "reutilizable" =>$benef->reutilizable,
                    "cantUsos" =>$benef->cantUsos,        

                    ]);


                  // }
                
         $this->dispatch("solicitudCreated");

     }



     public function delete(){    
            $registrosAEliminar = EstadoCondicionesRequerida::where('idMiembro', $this->id)
                                                ->where('idBeneficio', $this->idbeneficio)
                                                ->get();

              // Eliminar los registros obtenidos
            $registrosAEliminar->each->delete();
          $this->dispatch("solicitudCancel");

     }
                

    public function render()
    {
        return view('livewire.admin.guest.modal-preaprovado');
    }
}
