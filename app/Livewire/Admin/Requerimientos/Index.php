<?php

namespace App\Livewire\Admin\Requerimientos;

use App\Models\Beneficio;
use Livewire\Component;
use App\Models\EstadoCondicionesRequerida;
use App\Models\EstadoCondicionRequeridaAfiliado;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Index extends Component
{


  
  use WithPagination;

  public $dni,$p;
  public $cant;

  public $beneficios;
  public $desde;
  public $hasta;
  
  public $query,$nombre;
  public $idMiembro,$idBeneficio;
  public $method="";    
  public $filter=[0,1,2];    
  public $id="";    
  public $field="apellido";    
        
    public function option($method, $id){
    
      if($method == "delete" || $method == "update"){                
              $this->method =$method ;
              // $this->idMiembro = $idMiembro;
              $this->id = $id;        
          }
          
      }

    #[On(['condicionReqMieUpdated','condicionReqMieDeleted' ] )]
      public function mount(){                        
          $this->method="";
          $this->resetPage(); 

          $this->beneficios=Beneficio::where("estado",1)->get(); 

          if($this->dni){
            $this->field="documento";
            $this->query =$this->dni;
          }
      }
      
    public function render()
    {

      
      
     $query = EstadoCondicionesRequerida::with('requerimiento')
        ->orderBy('id', 'desc');
      
                
    
     if (!empty($this->filter)) {
        $query->whereIn('estado', $this->filter);
    }
      
      if ($this->idBeneficio) {
      $query->where("idBeneficio",$this->idBeneficio);
    }

      if ($this->desde && $this->hasta) {
    // Si ambas fechas están completas, filtra dentro del rango
    $query->whereBetween('fechaRegistro', [
        $this->desde . ' 00:00:00',
        $this->hasta . ' 23:59:59'
    ]);
} elseif ($this->desde) {
    // Si solo se proporciona la fecha "desde", filtra igual o mayor
    $query->where('fechaRegistro', '>=', $this->desde . ' 00:00:00');
} elseif ($this->hasta) {
    // Si solo se proporciona la fecha "hasta", filtra igual o menor
    $query->where('fechaRegistro', '<=', $this->hasta . ' 23:59:59');
}


      

      if ($this->query) {
        
        if($this->field == "nombreRequerimiento"){
          $query->whereHas('condicionReq', function ($subQuery) {
              $subQuery->where($this->field, 'like', '%'.$this->query.'%');
          });
        } 
          elseif($this->field == "apellido" || $this->field == "documento")
          $query->whereHas('user', function ($subQuery) {
              $subQuery->where($this->field, 'like', '%'.$this->query.'%');
          });
      }
      

    $requerimientos = $query->orderBy("fechaRegistro");

    $this->cant =  $requerimientos->count();
    $requerimientos = $query->paginate(15);
      
    return view('livewire.admin.requerimientos.index', compact("requerimientos"));
        // 
    }
}
