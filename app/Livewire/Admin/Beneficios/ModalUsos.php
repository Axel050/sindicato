<?php

namespace App\Livewire\Admin\Beneficios;

use App\Models\Beneficio;
use App\Models\BeneficiosUsos;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class ModalUsos extends Component
{

  use WithFileUploads;
  use WithPagination;


    public $id,$desde,$hasta,$cant,$beneficio;
               

    public function del($id){

          $uso = BeneficiosUsos::find($id);          

          if($uso){
            $uso->delete();
            // $uso->forceDelete();
            $this->dispatch("usoDeleted");
          }

        }

    public function render()
    {
         
          // $usos = BeneficiosUsos::onlyTrashed()->where("id_beneficio",$this->id)
          $usos = BeneficiosUsos::where("id_beneficio",$this->id)
          ->orderBy('id', 'desc');
          $this->beneficio = Beneficio::find($this->id);

          if ($this->desde && $this->hasta) {
   
              $usos->whereBetween('fecha_uso', [
                  $this->desde . ' 00:00:00',
                  $this->hasta . ' 23:59:59'
              ]);
          } elseif ($this->desde) {

              $usos->where('fecha_uso', '>=', $this->desde . ' 00:00:00');
          } elseif ($this->hasta) {

              $usos->where('fecha_uso', '<=', $this->hasta . ' 23:59:59');
          }

          $this->cant =  $usos->count();
          $usos= $usos->paginate(12);

        return view('livewire.admin.beneficios.modal-usos', compact("usos"));
    }
}
