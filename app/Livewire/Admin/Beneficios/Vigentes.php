<?php

namespace App\Livewire\Admin\Beneficios;

use App\Models\Beneficio;
use App\Models\EstadoCondicionesRequerida;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Vigentes extends Component
{
  
  use WithPagination;


  public $query,$nombre;
  public $idMiembro,$idBeneficio;
  public $method="";    
  public $filter="0";    

    
    public function upd( $provincia){
      $this->nombre=  $provincia->nombre;
      $this->method=  "Editar";
    }


    public function option($method, $idMiembro=false,$idBeneficio){

      
      if($method == "delete" || $method == "update"){                
                  $this->method =$method ;
                  $this->idMiembro = $idMiembro;
                  $this->idBeneficio = $idBeneficio;        
          }
          

      }


      


    #[On(['solicitudDeleted' ] )]
      public function mount(){
        $this->method="";
        $this->resetPage(); 
      }

      
    public function render()
    {
      
    //   $query = EstadoCondicionesRequerida::with('beneficio')
    // ->select('idMiembro', 'idBeneficio', 'fechaRegistro')
    // ->groupBy('idMiembro', 'idBeneficio', 'fechaRegistro')
    // ->orderBy('id', 'desc');

    //   // Aplica los filtros según el valor de $this->filter
    //   if ($this->filter === "0") {
    //       $query->where('estado', 0);
    //   } elseif ($this->filter === "1") {
    //       $query->where('estado', 1);
    //   }

     $query = EstadoCondicionesRequerida::with('beneficio')
        ->select('idMiembro', 'idBeneficio', 'fechaRegistro')
        ->selectRaw('COUNT(*) as total_registros') // Contar total de registros por grupo
        ->selectRaw('SUM(CASE WHEN estado = 1 THEN 1 ELSE 0 END) as total_estado_1') // Contar cuántos tienen estado 1
        ->selectRaw('SUM(CASE WHEN estado = 0 THEN 1 ELSE 0 END) as total_estado_0') // Contar cuántos tienen estado 0
        ->groupBy('idMiembro', 'idBeneficio', 'fechaRegistro')
        ->orderBy('id', 'desc');

    // Aplica los filtros según el valor de $this->filter
    if ($this->filter === "0") {
        // Filtra solo grupos donde todos los registros tienen estado = 0
        $query->havingRaw('total_estado_0 = total_registros');
    } elseif ($this->filter === "1") {
        // Filtra solo grupos donde todos los registros tienen estado = 1
        $query->havingRaw('total_estado_1 = total_registros');
    }


    // Si hay una búsqueda por palabra clave, se aplica al modelo Beneficio
      if ($this->query) {
          $query->whereHas('beneficio', function ($subQuery) {
              $subQuery->where('nombre', 'like', '%'.$this->query.'%');
          });
      }


    // Ejecuta la consulta y pagínala
    $beneficios = $query->paginate(15);

          

      
        return view('livewire.admin.beneficios.vigentes', compact("beneficios"));
    }
}
