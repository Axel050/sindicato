<?php

namespace App\Livewire\Admin;

use App\Models\Beneficio;
use App\Models\EstadoCondicionesRequerida;
use App\Models\Hijo;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $hijos =0;

    public $miembros =0;
    public $revision =0;

    public $beneficiosTotalActivos =0;
    public $beneficiosTotalInactivos =0;

    public $beneficios =0;
    public $beneficiosVig =0;

    public function mount(){
      $this->miembros = User::where("idRol", 3)->count();

      $this->revision = User::where("idRol", 2)->count();      

      $this->hijos = Hijo::count();

      $this->beneficiosTotalActivos = Beneficio::where("estado",1)->count();
      $this->beneficiosTotalInactivos = Beneficio::where("estado",0)->count();
      
      

    

    $query = EstadoCondicionesRequerida::with('beneficio')
        ->select('idMiembro', 'idBeneficio', 'fechaRegistro')
        ->selectRaw('COUNT(*) as total_registros') // Contar total de registros por grupo
        ->selectRaw('SUM(CASE WHEN estado = 1 THEN 1 ELSE 0 END) as total_estado_1') // Contar cuántos tienen estado 1
        ->selectRaw('SUM(CASE WHEN estado = 0 THEN 1 ELSE 0 END) as total_estado_0') // Contar cuántos tienen estado 0
        ->groupBy('idMiembro', 'idBeneficio', 'fechaRegistro')
        ->orderBy('id', 'desc');

    
          $bV = clone $query;
          $b = clone $query;

          $this->beneficios = $b->havingRaw('total_estado_0 = total_registros')->count();     
          $this->beneficiosVig = $bV->havingRaw('total_estado_1 = total_registros')->count();


  
         

    }




    public function render()
    {
        return view('livewire.admin.dashboard');
    }

}
