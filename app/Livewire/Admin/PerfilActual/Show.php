<?php

namespace App\Livewire\Admin\PerfilActual;

use Livewire\Component;
use App\Models\User;
use App\Models\Conyuge;
use App\Models\Empresa;
use App\Models\Gremio;
use App\Models\Hijo;
use App\Models\Sectore;
use App\Rules\UniqueDocument;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;

class Show extends Component
{

    public $title;
    public $id;
    public $bg;    
    public $method;    

    public $user;
    
    public $name;
    public $apellido;
    public $documento;
    public $genero;
    public $fechaNac;
    public $direccion;
    public $telefono;
    public $telefonoLaboral;
    public $email;
    public $fechaAfiliacion;

    public $legajo;
    public $conyugue=0;
    public $hijos=0;  
    public $password;
    public $password_confirmation;
        
    public $localidad;
    public $empresas;
    public $empresaId;
    public $sectores;
    public $sectorId;
    public $gremios;
    public $gremioId;
  
    public $nombreConyugue;
    public $apellidoConyugue;
    public $documentoConyugue;
    public $generoConyugue;
    public $fechaNacConyugue;
    public $idConyugue;

    public $hijosData=[];
    

      
     public function mount(){
        Log::alert(">method");
        Log::alert($this->method);

          $this->method="show";    
          $this->title= "Informacion del ";              
          $this->bg="background-color: rgb(22 163 74)"; 


              $this->hijosData = array_fill(0, $this->hijos, [
                    'documento' => '',            
                    'apellido' => '',
                    'nombre' => '',
                    'genero' => '',            
                    'fechaNac' => '',          
                    "id" => ""  
                ]);

              $this->empresas=Empresa::orderBy("nombreEmpresa","asc")->get();
              $this->sectores=Sectore::orderBy("nombreSector","asc")->get();
              $this->gremios=Gremio::orderBy("nombreGremio","asc")->get();      

             
              $this->user =  auth()->user();
              $this->name = $this->user->name ;
              $this->apellido = $this->user->apellido ;
              $this->documento = $this->user->documento ;
              $this->genero = $this->user->sexo;
              $this->fechaNac =date('Y-m-d', strtotime($this->user->fNac));
              $this->direccion = $this->user->direccion ;
              $this->telefono = $this->user->telefono ;
              $this->telefonoLaboral = $this->user->telefonoLaboral ;
              $this->email = $this->user->email ;
              $this->localidad = $this->user->localidad ;              
              $this->fechaAfiliacion =date('Y-m-d', strtotime($this->user->fechaAfiliacion));
              $this->empresaId = $this->user->idEmpresa ;
              $this->sectorId = $this->user->idSector ;
              $this->gremioId = $this->user->idGremio ;              
              $this->legajo = $this->user->legajo ;              
              $this->conyugue = $this->user->conyuge ? 1 :  0 ;
              $this->hijos = $this->user->hijos->count() ;

              foreach ($this->user->hijos as $h) {                
                  $this->hijosData[] = [
                      'documento' => $h->dni,
                      'apellido' => $h->apellido,
                      'nombre' => $h->nombre,
                      'genero' => $h->sexo,
                      'fechaNac' => date('Y-m-d', strtotime($h->fNac)),
                      'id' => $h->id,
                  ];
                
              }



              if($this->user->conyuge){
                $this->idConyugue =$this->user->conyuge?->id;
                $this->nombreConyugue = $this->user->conyuge?->nombre;
                $this->apellidoConyugue = $this->user->conyuge?->apellido;
                $this->documentoConyugue = $this->user->conyuge?->documento;
                $this->generoConyugue = $this->user->conyuge?->sexo;
                $this->fechaNacConyugue = date('Y-m-d', strtotime($this->user->conyuge?->fNac));
              }

              $this->title= "Informacion del ";              
                $this->bg="background-color: rgb(22 163 74)"; 

            }



            public function option($method){

              $this->method = $method;
              if($method == "show"){
                $this->title= "Informacion del ";              
                $this->bg="background-color: rgb(22 163 74)"; 
              }
              else {
                $this->title= "Editar"; 
                $this->bg="background-color: rgb(234 88 12)"; 
              }

            }
            

      
    

     protected function rules(){
       $rules  =  [
            'direccion' => 'required',         
            'name' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',            
            'documento' => 'required|unique:users', 
            'genero' => 'required',         
            'fechaNac' => 'required',         
            'gremioId' => 'required|integer',  
            'empresaId' => 'required',              
            'hijos' => 'required|integer',                                                                                              
          ]; 
                              
            $rules['documento'] = 'required|unique:users,documento,' . $this->user->id;                      
          
              if ( $this->password) {
                  $rules['password'] = 'required|string|confirmed|min:8';
              }
          

           
          
                    
          if($this->conyugue == 1  ){ 
            $rules['nombreConyugue'] = 'required';
            $rules['apellidoConyugue'] = 'required';
            // $rules['documentoConyugue'] = 'required';
            $rules['generoConyugue'] = 'required';
            $rules['fechaNacConyugue'] = 'required';
            $rules['documentoConyugue'] = ['required', new UniqueDocument($this->idConyugue)];
          }


            for ($i = 0; $i < $this->hijos; $i++) {
              $rules["hijosData.$i.nombre"]   = 'required';
              $rules["hijosData.$i.apellido"]  = 'required';
              $rules["hijosData.$i.genero"]    = 'required';              
              $rules["hijosData.$i.fechaNac"]   = 'required';
              $rules["hijosData.$i.documento"] = ['required', new UniqueDocument('',$this->hijosData[$i]['id'], '')];
           }
          
           
          return $rules;
        }
        

    protected function messages(){
       return [                      
            "name.required" => "Ingrese nombre.",            
            "apellido.required"=> "Ingrese apellido.",
            "telefono.required"=> "Ingrese telefono.",
            "email.required"=> "Ingrese mail.", 
            'email.email' => 'Ingrese un mail válido.',
            'email.unique' => 'Mail existente.',
            "idRol.required"=> "Elijo un rol.",
            "password.required"=> "Ingrese clave.",
            "password.confirmed"=> "Las claves no coinciden.",            
            "password.min"=> "Debe tener al menos 8 caracteres.",            
            "empresaId.required"=> "Elija una empresa.",
            "documento" => "Ingrese documento.",
            "documento.unique" => "Documento existente.",
            "genero" => "Elija genero.",
            "fechaNac" => "Elija fecha.",
            "direccion" => "Ingrese direccion.",
            "gremioId" => "Elija sindicato.",            
            
            
            "hijosData.*.nombre.required" => "Ingrese nombre.",
            "hijosData.*.apellido" => "Ingrese apellido.",
            "hijosData.*.genero" => "Elija genero.",
            "hijosData.*.fechaNac" => "Elija fecha.",            
            "hijosData.*.documento.required" => "Ingrese documento.",

            "nombreConyugue" => "Ingrese nombre.",
            "apellidoConyugue" => "Ingrese apellido.",
            "generoConyugue" => "Elija genero.",
            "fechaNacConyugue" => "Elija fecha.",            
            "documentoConyugue.required" => "Ingrese documento.",


          ];                 
      }

         

     public function edit(){


      $this->validate(  $this->rules(), $this->messages()); 

      $user=  $this->user ;
      $user->name= $this->name;
      $user->apellido= $this->apellido;
      $user->documento= $this->documento;
      $user->sexo= $this->genero;
      $user->fNac= $this->fechaNac;
      $user->direccion= $this->direccion;      
      $user->telefono= $this->telefono;
      $user->telefonoLaboral= $this->telefonoLaboral;              
      $user->email= $this->email;  
      $user->localidad= $this->localidad;
      $user->fechaAfiliacion= $this->fechaAfiliacion;
      $user->idEmpresa= $this->empresaId;
      $user->idGremio= $this->gremioId;
      $user->idSector= $this->sectorId;    
      $user->legajo= $this->legajo;
    
      
      if($this->password){
        $user->password= bcrypt($this->password);
      }
      
      $user->save();
                
      if($this->conyugue == 0){
            $user->conyuge()->delete();
      }
      
      if($user->conyuge && $this->conyugue ==  1){                   
            $user->conyuge->nombre = $this->nombreConyugue;
            $user->conyuge->apellido = $this->apellidoConyugue;
            $user->conyuge->documento = $this->documentoConyugue;
            $user->conyuge->sexo = $this->generoConyugue;        
            $user->conyuge->fNac= $this->fechaNacConyugue;                        
            $user->conyuge->save();
          }

          elseif(!$user->conyuge && $this->conyugue == 1){ 
              $conyugue= Conyuge::create([
              "nombre"=>$this->nombreConyugue,
              "apellido"=>$this->apellidoConyugue,
              "documento"=>$this->documentoConyugue,
              "sexo"=>$this->generoConyugue,
              "fNac"=>$this->fechaNacConyugue,
              "idConyuge"=>$this->user->id,
        ]);
           }
      

      // $user->hijos()->delete();
        // Manejar hijos
    $existingHijosIds = $user->hijos->pluck('id')->toArray();
    $updatedHijosIds = [];

    foreach ($this->hijosData as $hijoData) {
          // Encuentra el hijo por ID o documento, si existe
          $hijo = Hijo::where('idPadre', $user->id)
                     ->where('dni', $hijoData['documento'])
                     ->first();

          if ($hijo) {
              // Actualizar hijo existente
              $hijo->update([
                  'nombre' => $hijoData['nombre'],
                  'apellido' => $hijoData['apellido'],
                  'dni' => $hijoData['documento'],
                  'sexo' => $hijoData['genero'],
                  'fNac' => $hijoData['fechaNac'],
              ]);
              $updatedHijosIds[] = $hijo->id;
            } else {
                // Crear nuevo hijo
                $nuevoHijo = Hijo::create([
                    'nombre' => $hijoData['nombre'],
                    'apellido' => $hijoData['apellido'],
                    'dni' => $hijoData['documento'],
                    'sexo' => $hijoData['genero'],
                    'fNac' => $hijoData['fechaNac'],
                    'idPadre' => $user->id,
                    'estado' => 0,
              ]);
              $updatedHijosIds[] = $nuevoHijo->id;
        }
    }

    // Eliminar hijos que no están en los datos enviados
    $hijosParaEliminar = array_diff($existingHijosIds, $updatedHijosIds);
    Hijo::destroy($hijosParaEliminar);
        if($this->hijos == 0 ){
          $user->hijos()->delete();
        }
      


      $this->dispatch("UserUpdated");
      $this->option("show");

     }

     public function removeHijo($index)
    {
        if ($this->hijos > 1) {
            unset($this->hijosData[$index]);
            $this->hijosData = array_values($this->hijosData); // Re-indexar el array
            $this->hijos--;
        }else{
          $this->hijos = 0;
        }

    }
    
        

        #[On(['UserUpdated'] )]  
    public function render()
    {
        return view('livewire.admin.perfil-actual.show');
    }
}
