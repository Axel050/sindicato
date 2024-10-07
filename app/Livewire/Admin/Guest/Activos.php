<?php

namespace App\Livewire\Admin\Guest;

use App\Models\BeneficioAfiliado;
use Carbon\Carbon;
use Livewire\Component;

class Activos extends Component
{


    public function render()
    {

      $id = auth()->user()->id;
      
        $hoy=Carbon::now();

        // CREO QUE VA BIEN ARREGLAR COMO SE GUARDAN FECHAS NULL AL CREAR BENEFICIO 

    $beneficios = BeneficioAfiliado::where('idAfiliado', $id)
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

    

        return view('livewire.admin.guest.activos', compact("beneficios"));
    }

}
  