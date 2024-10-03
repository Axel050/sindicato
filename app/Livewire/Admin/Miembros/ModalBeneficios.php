<?php

namespace App\Livewire\Admin\Miembros;

use App\Models\Beneficio;
use App\Models\BeneficioAfiliado;
use App\Models\BeneficioCondicion;
use App\Models\EstadoCondicionesRequerida;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ModalBeneficios extends Component
{

    public $title;
    public $id;
    public $bg;    
    public $method;
    public $btnText;    
    
    public $idMiembro;
    public $condicion;
    public $miembro;


    public $beneficios=[];
    public $idBeneficio;
    public $beneficioM;
    public $comentario;
    public $fechaDesde;
    public $fechaHasta;
    public $reutilizable=0;
    public $cantUsos=1;
      
     public function mount(){

      

      $this->beneficios=Beneficio::orderBy("nombre","asc")->get();
      $this->miembro = User::find($this->idMiembro);

      $this->condicion= $this->miembro->idCondicion;

     
      
      if($this->method == "save"){        
          $this->title= "Agregar";
          $this->btnText= "Guardar";
          $this->bg=	"background-color: rgb(22 163 74)";

          
        }
        
        if($this->method == "delete"){
          $this->beneficioM = BeneficioAfiliado::find($this->id);
          
          $this->title= "Quitar";
          $this->btnText= "Quitar";
          $this->bg=	"background-color: rgb(239 68 68)"; 
        }

        if($this->method == "update"){              
              $this->beneficioM = BeneficioAfiliado::find($this->id);                            

              $this->idBeneficio = $this->beneficioM->idBeneficio;
              $this->comentario = $this->beneficioM->comentario;
              $this->fechaDesde = $this->beneficioM->fechaDesde ;
              $this->fechaHasta = $this->beneficioM->fechaHasta ;
              $this->reutilizable = $this->beneficioM->reutilizable ;
              $this->cantUsos = $this->beneficioM->cantUsos ;
              
              // $this->fechaNac =date('Y-m-d', strtotime($this->user->fNac));
              
              
                            
              $this->title= "Editar";
              $this->btnText= "Guardar"; 
              $this->bg="background-color: rgb(234 88 12)";
            }

      
     }

     public function updatedIdBeneficio(){

      if($this->idBeneficio){        
        $beneficio = Beneficio::find($this->idBeneficio);

        $this->fechaDesde=$beneficio->fechaDesde;
        $this->fechaHasta=$beneficio->fechaHasta;
        $this->reutilizable=$beneficio->reutilizable;
        $this->cantUsos=$beneficio->cantUsos;

      }
        
     }

     protected function rules(){
       return   [
            'idBeneficio' => 'required',
          ];
                                                                      
           
          
        }

        

    protected function messages(){
       return [                      
            "idBeneficio.required" => "Elija Beneficio.",             
          ];                 
      }

    
     public function save(){

       $this->validate(  $this->rules(), $this->messages()); 

        $exists = Beneficio::where("id",$this->idBeneficio)
                      ->whereRaw('FIND_IN_SET(?, REPLACE(condiciones, "-", ","))', [$this->condicion])
                      ->exists(); 

        if (!$exists) {
        $this->addError('beneficio_condicion', 'No disponible para este usuariao.');
        return;
      }

      $exists2 = BeneficioAfiliado::where("idBeneficio",$this->idBeneficio)
                      ->where('idAfiliado', $this->idMiembro)->exists();         

          if ($exists2) {
        $this->addError('exists', 'Beneficio existente.');
        return;
      }
    
       
      

        $beneficioMiembro = BeneficioAfiliado::create([
          "idBeneficio" =>$this->idBeneficio,                              
          "idAfiliado" =>$this->idMiembro,
                                       
          "fechaRegistro" =>now(),
          "idResponsable" =>1,
          "estado"=>1,
          
          "comentario" =>$this->comentario,
          "fechaDesde" =>$this->fechaDesde,
          "fechaHasta" =>$this->fechaHasta,
          
          "reutilizable" =>$this->reutilizable,
          "cantUsos" =>$this->cantUsos,        

        ]);

                
        
        if($beneficioMiembro){                    

              $beneficioCondiciones= BeneficioCondicion::where("idBeneficio",$beneficioMiembro->idBeneficio)->get();

                            
              $primera=true;              
              foreach ($beneficioCondiciones as $b) {                                          
                $estadoConReq = $b->estadoCondicionesRequeridas($this->idMiembro);              
                
                // borramos si hay requeridas por miembro previamente y creamos nuevas
                if($primera &&  $estadoConReq->count() > 0){                            
                  $estadoConReq->delete();
                }
                $primera=false;
                
                EstadoCondicionesRequerida::create([
                  "idCondicionRequerida" => $b->idCondicion,
                  "idBeneficio" => $b->idBeneficio,
                  "idMiembro" => $this->idMiembro,
                  "estado" => 1,
                ]);                                                                              
                          
          }
        }
        
                
         $this->dispatch("miembroCreated");

      
     }

     public function update(){


      $this->validate(  $this->rules(), $this->messages()); 

      $exists = Beneficio::where("id",$this->idBeneficio)
                      ->whereRaw('FIND_IN_SET(?, REPLACE(condiciones, "-", ","))', [$this->condicion])
                      ->exists(); 

        if (!$exists) {
        $this->addError('beneficio_condicion', 'No disponible para este usuario.');
        return;
      }

      $exists2 = BeneficioAfiliado::where("idBeneficio",$this->idBeneficio)
                      ->where('idAfiliado', $this->idMiembro)
                      ->where("id","!=",$this->beneficioM->id)
                      ->exists();         

          if ($exists2) {
        $this->addError('exists', 'Beneficio existente.');
        return;
      }

      $this->beneficioM->idBeneficio  = $this->idBeneficio;
      $this->beneficioM->comentario  = $this->comentario;
      $this->beneficioM->fechaDesde  = $this->fechaDesde;
      $this->beneficioM->fechaHasta  = $this->fechaHasta;
      $this->beneficioM->reutilizable  = $this->reutilizable;
      $this->beneficioM->cantUsos  = $this->cantUsos;
                       
      
      $this->beneficioM->save();
      
    
      $this->dispatch("miembroUpdated");

     }

     
    public function delete(){
            
      foreach($this->beneficioM->estadoCondicionesRequeridas as $req){
        $req->delete();
      }

      // borramos usos del beneficio      
      foreach($this->beneficioM->beneficioUsos($this->idMiembro)->get() as $uso){            
            $uso->delete();
      }

      $this->beneficioM->delete();



                
              
              $this->dispatch("miembroDeleted");
        }


        

    public function render()
    {
        return view('livewire.admin.miembros.modal-beneficios');
    }
}
