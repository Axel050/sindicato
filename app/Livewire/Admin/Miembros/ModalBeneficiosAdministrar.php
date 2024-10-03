<?php

namespace App\Livewire\Admin\Miembros;




use App\Models\Beneficio;
use App\Models\BeneficioAfiliado;
use App\Models\BeneficioCondicion;
use App\Models\BeneficiosUsos;
use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;
use Illuminate\Validation\ValidationException;

class ModalBeneficiosAdministrar extends Component
{

    public $title;
    public $id;
    public $bg;    
    public $method;
    public $btnText;    
    
    public $idMiembro;
    public $condicion;
    public $miembro;


    public $beneficio;
    public $idBeneficio;
    public $beneficioM;
    public $comentario;
    public $fechaDesde;
    public $fechaHasta;
    public $reutilizable=0;
    public $cantUsos=1;


    
    #[On(['usoDeleted' ,'usoCreated'] )] 
     public function mount(){
          
      $this->beneficio=Beneficio::find($this->id);
      $this->miembro = User::find($this->idMiembro);                                  
      
     }


     


    
     public function save(){

      if($this->beneficio->beneficioUsos($this->idMiembro)->count() >= $this->beneficio->cantUsos){
            throw ValidationException::withMessages([
            'error' => 'El beneficio ha alcanzado el límite de usos permitidos.'
        ]);

        }
      $uso = BeneficiosUsos::create([
        "id_beneficio" =>$this->id,
        "id_miembro" =>$this->idMiembro,
        "fecha_uso" => now(),
      ]);


                
      if($uso){
        $this->dispatch("usoCreated");
      }

      
     }

     
    public function delete($id){
              $uso = BeneficiosUsos::find($id);

              if($uso){
                $uso->delete();
                $this->dispatch("usoDeleted");
              }
              
                                                        
              
        }

    public function render()
    {
        return view('livewire.admin.miembros.modal-beneficios-administrar');
    }
}
