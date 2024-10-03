<?php

namespace App\Livewire\Admin\Guest;

use App\Models\Beneficio;
use App\Models\BeneficioAfiliado;
use App\Models\BeneficioCondicion;
use App\Models\EstadoCondicionesRequerida;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Preaprovados extends Component
{
    public $method;
    public $id;
    public $idBeneficio;

    public function solicitud($id,$tipo){

        if($tipo){
            $this->method="create";            
          }else{
            $this->method="delete";            
        }
        $this->idBeneficio=$id;

      
      
    }


    #[On(['solicitudCreated' ,'solicitudCancel' ] )]
    public function mount(){
        $this->method="";
    }

    public function render()
    {
        

      $id = auth()->user()->id;
        
      $this->id=$id;
      $idCondicion = auth()->user()->idCondicion;

      // dd([
      //   "id"=>$id,
      //   "idCOndi" =>$idCondicion
      
      // ]);

      // $beneficios = BeneficioAfiliado::where('idAfiliado', $id)
      // ->with('beneficio')
      // ->get();
      
      // $beneficios = Beneficio::whereRaw("FIND_IN_SET($idCondicion, REPLACE(condiciones, '-', ','))")->get();

      // $beneficios = Beneficio::with(['beneficioCondiciones.condicionReq', 'beneficioCondiciones.estadoCondicion'])->whereRaw("FIND_IN_SET($idCondicion, REPLACE(condiciones, '-', ','))")->get();


    //   $beneficios = Beneficio::with(['beneficioCondiciones.condicionReq', 'beneficioCondiciones.estadoCondicion'])
    // ->whereHas('beneficioCondiciones', function($query) use ($idCondicion) {
    //     $query->whereRaw("FIND_IN_SET(?, REPLACE(condiciones, '-', ','))", [$idCondicion]);
    // })
    // ->get();


    // $beneficios = Beneficio::with(['beneficioCondiciones.condicionReq', 'beneficioCondiciones.estadoCondicion'])
    // ->whereHas('beneficioCondiciones', function ($query) use ($idCondicion, $id) {
    //     $query->whereRaw("FIND_IN_SET(?, REPLACE(condiciones, '-', ','))", [$idCondicion])
    //           ->whereHas('estadoCondicion', function ($subQuery) use ($id) {
    //               $subQuery->where('estado', 0)
    //                        ->where('idMiembro', $id); // Filtramos por estado y el miembro
    //           });
    // })
    // ->get();

    // $beneficios = Beneficio::with(['beneficioCondiciones.condicionReq', 'beneficioCondiciones.estadoCondicionesRequerida3'])
    // ->whereHas('beneficioCondiciones', function ($query) use ($idCondicion, $id) {
    //     $query->whereRaw("FIND_IN_SET(?, REPLACE(condiciones, '-', ','))", [$idCondicion])
    //           ->whereHas('estadoCondicionesRequerida3', function ($subQuery) use ($id) {
    //               $subQuery->where('estado', '1')
    //                        ->where('idMiembro', $id); // Filtramos por estado y el miembro
    //           });
    // })
    // ->get();



$hoy = Carbon::now();


// $beneficios = Beneficio::with('beneficioCondiciones.condicionReq')
//     ->whereHas('beneficioCondiciones', function ($query) use ($idCondicion) {
//         $query->whereRaw("FIND_IN_SET(?, REPLACE(condiciones, '-', ','))", [$idCondicion]);
//     })
    
//      ->where(function ($query) use ($hoy) {
//         $query->where(function ($q) use ($hoy) {
//             $q->whereDate('fechaDesde', '<=', $hoy)
//               ->whereDate('fechaHasta', '>=', $hoy);
//         })
//         ->orWhereNull('fechaDesde')
//         ->orWhereNull('fechaHasta');
//     })
//     ->where("estado",1)

//     ->get();
    
    // }}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
    
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

