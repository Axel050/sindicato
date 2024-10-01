<?php

namespace App\Livewire\Admin\Guest;

use Livewire\Component;




  use App\Models\Beneficio;
use App\Models\BeneficioCondicion;
use App\Models\Condicione;
use App\Models\CondicionesRequerida;
use App\Models\EstadoCondicionesRequerida;
use Illuminate\Console\View\Components\Alert;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Spatie\Permission\Models\Role;

class ModalPreaprovado extends Component
{

  use WithFileUploads;

  public $method;
  
// @livewire('admin.guest.modalpre-aprovado',[ "method" => $method,"id"=>$id,"idbeneficio"=>$idBeneficio])
public $id;
public $idbeneficio;    

    public $title;
    public $bg;    
    public $btnText;    
    public $text;    

    public $beneficio;    

  
      
     public function mount()
     {       
      
      // else{
            
      //   $registrosAEliminar = EstadoCondicionesRequerida::where('idMiembro', $this->id)
      //                                           ->where('idBeneficio', $id)
      //                                           ->get();

      //     // Eliminar los registros obtenidos
      //   $registrosAEliminar->each->delete();

      // }


        if($this-> method=="create"){          
          $this->title= "Solicitud";          
          $this->btnText= "Solicitar";
          $this->text= "solicitar";
          
          $this->bg=	"background-color: rgb(22 163 74)";  
        }elseif($this->method == "delete"){
          $this->title= "Cancelar";
          $this->btnText= "Cancelar";
          $this->text= "cancelar la solicitud a";
          $this->bg="background-color: rgb(234 88 12)";

        }

        
        
        
        


      
     }

     
     public function create(){

      // dd([
      //   "id" => $this->id,
      //   "idBefe" =>$this->idbeneficio,
        
      // ]);

      $ben= Beneficio::find($this->idbeneficio);
 

      $beneficios = $ben->beneficioCondiciones;

      
        foreach ($beneficios as $ben) {
                   
          //  dd([
          //   "ven" =>$ben,
          //   "con"=> $ben->idCondicion,
          //   "id" => $id

          // ]);

                    EstadoCondicionesRequerida::create([
                      "idCondicionRequerida" => $ben->idCondicion,
                      "idBeneficio" => $this->idbeneficio,
                      "idMiembro" => $this->id,
                      "estado" => 0,
                      "fechaRegistro" => now(),
                      "idResponsable" => 1
                    ]);

            }
      
      

     
                
         $this->dispatch("solicitudCreated");

      
     }

     public function delete(){

    // dd("caaa")      ;
            $registrosAEliminar = EstadoCondicionesRequerida::where('idMiembro', $this->id)
                                                ->where('idBeneficio', $this->idbeneficio)
                                                ->get();

          // Eliminar los registros obtenidos
        $registrosAEliminar->each->delete();
      $this->dispatch("solicitudCancel");

     }


    // public function delete(){
              
    //           $beneficio = $this->beneficio;
    //           $this->beneficio->delete();

    //           $beneficio->beneficioCondiciones()->delete();
              
    //           // $this->user->hijos()->delete();
    //           // $this->user->conyuge()->delete();

    //           $this->dispatch("miembroDeleted");
    //     }


  

            

    public function render()
    {
        return view('livewire.admin.guest.modal-preaprovado');
    }
}
