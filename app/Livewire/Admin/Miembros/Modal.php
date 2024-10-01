<?php

namespace App\Livewire\Admin\Miembros;

use App\Models\Condicione;
use Livewire\Component;
use App\Models\User;
use App\Models\Conyuge;
use App\Models\Empresa;
use App\Models\Gremio;
use App\Models\Hijo;
use App\Models\Sectore;
use App\Rules\UniqueDocument;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class Modal extends Component
{

    public $title;
    public $id;
    public $bg;    
    public $method;
    public $btnText;    

    public $user;
    
    public $idRol;
    public $estado=0;

    public $name;
    public $apellido;
    public $documento;
    public $genero;
    public $fechaNac;
    public $direccion;
    public $telefono;
    public $telefonoLaboral;
    public $email;
    public $fechaAfiliacion=null;

    public $legajo;
    public $conyugue=0;
    public $hijos=0;  
    public $password;
    public $password_confirmation;
    
    public $condiciones;
    public $idCondicion;    
    public $localidad;
    public $empresas;
    public $empresaId;
    public $sectores;
    public $sectorId;
    public $gremios;
    public $gremioId;
  
    public $conyugeId;
    public $nombreConyugue;
    public $apellidoConyugue;
    public $documentoConyugue;
    public $generoConyugue;
    public $fechaNacConyugue;

    public $hijosData=[];

      
     public function mount(){

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
      $this->condiciones=Condicione::orderBy("nombreCondicion","asc")->get();

      if($this->method == "save"){        
          $this->title= "Crear";
          $this->btnText= "Guardar";
          $this->bg=	"background-color: rgb(22 163 74)";
        }
        
        if($this->method == "delete"){
          $this->user = User::find($this->id);
          $this->name = $this->user->name ;                    

          $this->title= "Eliminar";
          $this->btnText= "Eliminar";
          $this->bg=	"background-color: rgb(239 68 68)"; 
        }

        if($this->method == "update"){              
              $this->user = User::find($this->id);

              $this->name = $this->user->name ;
              $this->apellido = $this->user->apellido ;
              $this->documento = $this->user->documento ;
              $this->genero = $this->user->sexo;

              if($this->user->fNac){
                $this->fechaNac =date('Y-m-d', strtotime($this->user->fNac));
              }

              $this->direccion = $this->user->direccion ;
              $this->telefono = $this->user->telefono ;
              $this->telefonoLaboral = $this->user->telefonoLaboral ;
              $this->email = $this->user->email ;
              $this->localidad = $this->user->localidad ;              

              if($this->user->fechaAfiliacion){
              $this->fechaAfiliacion =date('Y-m-d', strtotime($this->user->fechaAfiliacion));
              }

              $this->empresaId = $this->user->idEmpresa ;
              $this->sectorId = $this->user->idSector ;
              $this->gremioId = $this->user->idGremio ;
              $this->idCondicion = $this->user->idCondicion ;
              $this->legajo = $this->user->legajo ;
              $this->estado = $this->user->estado ;            
              $this->idRol = $this->user->idRol ;             
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
                $this->conyugeId= $this->user->conyuge?->id;
                $this->nombreConyugue = $this->user->conyuge?->nombre;
                $this->apellidoConyugue = $this->user->conyuge?->apellido;
                $this->documentoConyugue = $this->user->conyuge?->documento;
                $this->generoConyugue = $this->user->conyuge?->sexo;
                $this->fechaNacConyugue = date('Y-m-d', strtotime($this->user->conyuge?->fNac));
              }
                            
              $this->title= "Editar";
              $this->btnText= "Guardar"; 
              $this->bg="background-color: rgb(234 88 12)";
            }

      
     }

     protected function rules(){
       $rules  =  [
            'direccion' => 'required',         
            'name' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            
            'genero' => 'required',         
            'fechaNac' => 'required',         
            'gremioId' => 'required|integer',  
            'empresaId' => 'required',  
            'idCondicion' => 'required',  
            'hijos' => 'required|integer',                                      
            'idRol' => 'required',                                                  
          ]; 
          
          
          if($this->method == "update"){              
            $rules['email'] = 'required|email|unique:users,email,' . $this->user->id;
            $rules['documento'] = 'required|unique:users,documento,' . $this->user->id;                      
                if ( $this->password) {
                    $rules['password'] = 'required|string|confirmed|min:8';
                }
            }

           elseif($this->method == "save"){  
                  $rules['documento'] = 'required|unique:users' ;
                  $rules['email'] = 'required|email|unique:users';
                  $rules['password'] = 'required|string|confirmed|min:8';
           }
          
                    
          if($this->conyugue == 1  ){             
            $rules['nombreConyugue'] = 'required';
            $rules['apellidoConyugue'] = 'required';            
            $rules['documentoConyugue'] = ['required', new UniqueDocument($this->conyugeId)];
            $rules['generoConyugue'] = 'required';
            $rules['fechaNacConyugue'] = 'required';
            
          }


            for ($i = 0; $i < $this->hijos; $i++) {                            
              $rules["hijosData.$i.nombre"]   = 'required';
              $rules["hijosData.$i.apellido"]  = 'required';
              $rules["hijosData.$i.genero"]    = 'required';
              $rules["hijosData.$i.documento"] = ['required', new UniqueDocument('',$this->hijosData[$i]['id'], $this->id)];
              $rules["hijosData.$i.fechaNac"]   = 'required';
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
            "documento.required" => "Ingrese documento.",
            "documento.unique" => "Documento existente.",
            "genero" => "Elija genero.",
            "fechaNac" => "Elija fecha.",
            "direccion" => "Ingrese direccion.",
            "gremioId" => "Elija sindicato.",
            "idCondicion" => "Elija condicion.",
            
            
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

    
     public function save(){

       $this->validate(  $this->rules(), $this->messages()); 
      


        $miembro = User::create([
          "name" =>$this->name,
          "apellido" =>$this->apellido,
          "email" =>$this->email,
          "telefono" =>$this->telefono,
          "telefonoLaboral" =>$this->telefonoLaboral,
          "direccion" =>$this->direccion,
          "sexo" =>$this->genero,
          "fNac" =>$this->fechaNac,
                             
          "localidad" =>$this->localidad,
          "documento" =>$this->documento,
          "fechaAfiliacion"=>$this->fechaAfiliacion,
          
          "idEmpresa" =>$this->empresaId,
          "idGremio" =>$this->gremioId,
          "idSector" =>$this->sectorId,
          "idCondicion" =>$this->idCondicion,
          "legajo" =>$this->legajo,

          "password" =>bcrypt($this->sectorId),
           
          "idRol" =>$this->estado == 1 ? 3 : $this->idRol, //si es activo , rol=miembro
          "estado" =>$this->estado, 
                    
        ]);

        // 
        $rol = Role::find($this->idRol);

      
      if($this->estado == 0  ){                        
        $roleName= $rol->name;        
        $miembro->assignRole($roleName);
      }
      else if($this->estado == 1 ){                     
              $miembro->assignRole("Miembro");
              $miembro->idRol= 3;
        }
        // 
        
        $id = $miembro->id;
        

        if($this->conyugue == 1){
        $conyugue= Conyuge::create([
          "nombre"=>$this->nombreConyugue,
          "apellido"=>$this->apellidoConyugue,
          "documento"=>$this->documentoConyugue,
          "sexo"=>$this->generoConyugue,
          "fNac"=>$this->fechaNacConyugue,
          "idConyuge"=>$id,
        ]);
      }


      if ($this->hijos > 0 ) {
         foreach ($this->hijosData as $hijo) { 
                            
          Hijo::create([
            "nombre"=>$hijo['nombre'],
            "apellido"=>$hijo['apellido'],
            "dni"=>$hijo['documento'],
            "sexo"=>$hijo['genero'],
            "fNac"=>$hijo['fechaNac'],
            "idPadre"=>$id,
            "estado"=>0
          ]);
  
         
        }
        }
                
         $this->dispatch("miembroCreated");

      
     }

     public function update(){


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

      
      
      $user->fechaAfiliacion= $this->fechaAfiliacion ;
      

      $user->idEmpresa= $this->empresaId;
      $user->idGremio= $this->gremioId;
      $user->idSector= $this->sectorId;
      $user->idCondicion= $this->idCondicion;
      $user->legajo= $this->legajo;
      $user->idRol= $this->idRol;
      $user->estado= $this->estado;
      
      if($this->password){
        $user->password= bcrypt($this->password);
      }

      $rol = Role::find($this->idRol);

      if($this->estado ==  0 && $this->idRol == 3){
              $rolName = $rol->name;
              $user->removeRole($rolName);
      }
      else if($this->estado == 0  &&  $this->idRol == 2){
                        
        $roleName= $rol->name;        
        $user->assignRole($roleName);
      }
      else if($this->estado == 1 ){       
              $user->removeRole("UsuarioPendienteRevision");
              $user->assignRole("Miembro");
              $user->idRol= 3;
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
              "idConyuge"=>$this->id,
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
      


      $this->dispatch("miembroUpdated");

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

    public function delete(){
              $idRol = $this->user->idRol;
              $this->user->delete();

              $rol = Role::find($idRol);
              $rolName = $rol->name;
              $this->user->removeRole($rolName);

              $this->user->hijos()->delete();
              $this->user->conyuge()->delete();

              $this->dispatch("miembroDeleted");
        }


        
    public function render()
    {
        return view('livewire.admin.miembros.modal');
    }
}
