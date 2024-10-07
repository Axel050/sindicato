<?php

namespace App\Livewire\Admin\Guest;

use Livewire\Component;
use App\Models\Beneficio;
use App\Models\EstadoCondicionesRequerida;
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

  
      
     public function mount()
     {       
      
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

      $ben= Beneficio::find($this->idbeneficio); 
      $beneficios = $ben->beneficioCondiciones;
  
        foreach ($beneficios as $ben) {

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
