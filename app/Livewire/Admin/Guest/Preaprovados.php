<?php

namespace App\Livewire\Admin\Guest;

use App\Models\Beneficio;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;


class Preaprovados extends Component
{
    public $methodReq;
    public $methodReqPerfil;
    public $method;
    public $id;
    public $idBeneficio;


    public $idUse;
    public $idBen;
    public $idCon;

    public function solicitud($id,$tipo){

        if($tipo){
            $this->method="create";            
          }else{
            $this->method="delete";            
        }
        $this->idBeneficio=$id;
            
    }



    #[On(['solicitudCreated' ,'solicitudCancel' ,'condicionReqUpdated'] )]
    public function mount(){
        $this->method="";
        $this->methodReq="";
        $this->methodReqPerfil="";        
    }

    public function datos($idUse=null,$idBen=null,$idCon=null){
      $this->idUse = $idUse;
      $this->idBen = $idBen;
      $this->idCon = $idCon;
      // dd([
      // "use" =>$idUse  ,
      // "ben" =>$idBen  ,
      // "cond" =>$idCon  ,
      // "use2" =>$this->idUse  ,
      // "ben2" =>$this->idBen  ,
      // "cond2" =>$this->idCon  ,
      // ]);
      $this->methodReqPerfil=true;
    }

    public function render()
    {
        
      $id = auth()->user()->id;
        
      $this->id=$id;
      $idCondicion = auth()->user()->idCondicion;

      $hoy = Carbon::now();

    
    $beneficios = Beneficio::with('beneficioCondiciones.condicionReq')
    ->whereHas('beneficioCondiciones', function ($query) use ($idCondicion) {
        $query->whereRaw("FIND_IN_SET(?, REPLACE(condiciones, '-', ','))", [$idCondicion]);
    })
    ->where(function ($query) use ($hoy) {
        // Caso 1: Fecha actual entre fechaDesde y fechaHasta
        $query->where(function ($q) use ($hoy) {
            $q->whereDate('fechaDesde', '<=', $hoy)
              ->whereDate('fechaHasta', '>=', $hoy);
        })
        // Caso 2: Ambos campos son nulos
        ->orWhere(function ($q2) {
            $q2->whereNull('fechaDesde')
               ->whereNull('fechaHasta');
        })
        // Caso 3: Uno de los campos es nulo y el otro se compara con la fecha actual
        ->orWhere(function ($q3) use ($hoy) {
            $q3->where(function ($q4) use ($hoy) {
                // fechaDesde es null, pero fechaHasta es mayor o igual a hoy
                $q4->whereNull('fechaDesde')
                   ->whereDate('fechaHasta', '>=', $hoy);
            })
            ->orWhere(function ($q5) use ($hoy) {
                // fechaHasta es null, pero fechaDesde es menor o igual a hoy
                $q5->whereNull('fechaHasta')
                   ->whereDate('fechaDesde', '<=', $hoy);
            });
        });
    })
    ->where("estado", 1)
    ->get();


        return view('livewire.admin.guest.preaprovados', compact("beneficios"));
    }
}
// CAMBIARN SOLICITAR , A ACTIVAR ; QUE SE MUESTRE EL ESTADO DE LOS REQUERIEMIENTOS SIN TOCAR NADA ; Y SI ESTAN TODOS OK AL PREIONAR EL BOTON "ACTIVAR" SE VA A ACTIVOS ; SINO MOSTRAR BOTON disaBLED O CON OTRO TEXTO, y que me mande a los requeriemnrotns sin falta alguno  ,podria tener 2 estados , activar beneficio  y requerimientos incompletos
