<?php

namespace App\Livewire\Admin\Beneficios;

use App\Models\Beneficio;
use App\Models\BeneficioAfiliado;
use App\Models\BeneficioCondicion;
use App\Models\BeneficiosUsos;
use App\Models\Condicione;
use App\Models\CondicionesRequerida;
use App\Models\EstadoCondicionesRequerida;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile as SupportFileUploadsTemporaryUploadedFile;
use Livewire\Features\SupportFileUploads\WithFileUploads;


class ModalReboot extends Component
{

  use WithFileUploads;

    public $id;

    public $beneficio;    
    public $asig=true;    
    public $doc=true;    
    public $uso=true;    


  
    public $idRol;

    public $nombre;
    public $fechaDesde=null;
    public $fechaHasta=null;
    public $descripcion;
    public $estado=1;
    public $reutilizable=0;
    public $cantUsos=1;
    public $bannerBeneficio;

    public $membresias =[];
    public $condiciones;
    public $idCondiciones=[];
    public $idCondicion;    
  
    public $condicionesReq;
    public $idCondicionReq;
    public $descripcionReq;

      
     public function mount()
     {       

      $this->condiciones=Condicione::orderBy("nombreCondicion","asc")->get();
      $this->condicionesReq=CondicionesRequerida::orderBy("nombreRequerimiento","asc")->get();
      
      
      $this->beneficio = Beneficio::find($this->id);
      
      $condicionesGuardadas = explode('-', $this->beneficio->condiciones); 
              
              $this->idCondiciones = $condicionesGuardadas;  
              
              if($this->beneficio->fechaDesde){
                $this->fechaDesde =date('Y-m-d', strtotime($this->beneficio->fechaDesde));
              }

            if($this->beneficio->fechaHasta){
                $this->fechaHasta =date('Y-m-d', strtotime($this->beneficio->fechaHasta)); 
              }
              
              $this->descripcion = $this->beneficio->descripcion;  
              $this->estado = $this->beneficio->estado ;                                      
              $this->reutilizable = $this->beneficio->reutilizable ? 1 :  0 ;
              $this->cantUsos = $this->beneficio->cantUsos  ;                                        
              
              
      
            }


    
            
            public function rebootB(){
              
                if($this->doc){
                  EstadoCondicionesRequerida::where("idBeneficio",$this->beneficio->id)->delete();                          
                }

                if($this->uso){
                  BeneficiosUsos::where("id_beneficio",$this->beneficio->id)->delete();
                }

                if($this->asig){
                  BeneficioAfiliado::where("idBeneficio",$this->beneficio->id)->delete();
                }



              
              
              $this->dispatch("rebootBen");
              
     }







    public function render()
    {
        return view('livewire.admin.beneficios.modal-reboot');
    }
}
