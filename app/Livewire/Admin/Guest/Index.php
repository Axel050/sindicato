<?php

namespace App\Livewire\Admin\Guest;

use App\Models\Beneficio;
use App\Models\BeneficioAfiliado;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        
      $user =auth()->user(); 

      $idCondicion =$user->idCondicion; 

      $hoy=Carbon::now();

      $beneficiosPre = Beneficio::with('beneficioCondiciones.condicionReq')
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

    $cantPre=0;
    foreach ($beneficiosPre as $pre ) {
          if(!$pre->estadoC($user->id)){
            $cantPre++;
          }
    }


    $today = now();


$beneficiosAfi = BeneficioAfiliado::where('idAfiliado', $user->id)
    ->whereHas('beneficio', function ($query) use ($hoy) {
        $query->where('estado', 1)  // Solo beneficios con estado = 1
              ->where(function ($q) use ($hoy) {
                  // Agrupamos las condiciones de fechas correctamente
                  $q->where(function ($q2) use ($hoy) {
                      // Caso 1: Fecha actual entre fechaDesde y fechaHasta
                      $q2->whereDate('fechaDesde', '<=', $hoy)
                         ->whereDate('fechaHasta', '>=', $hoy);
                  })
                  // Caso 2: Ambos campos son nulos
                  ->orWhere(function ($q3) {
                      $q3->whereNull('fechaDesde')
                         ->whereNull('fechaHasta');
                  })
                  // Caso 3: Uno de los campos es nulo y el otro se compara con la fecha de hoy
                  ->orWhere(function ($q4) use ($hoy) {
                      $q4->where(function ($q5) use ($hoy) {
                          $q5->whereNull('fechaDesde')
                             ->whereDate('fechaHasta', '>=', $hoy);
                      })
                      ->orWhere(function ($q6) use ($hoy) {
                          $q6->whereNull('fechaHasta')
                             ->whereDate('fechaDesde', '<=', $hoy);
                      });
                  });
              });
    })
    ->with('beneficio')
    ->get();





        return view('livewire.admin.guest.index' , compact(["cantPre","user","beneficiosAfi"]));
    }
}
