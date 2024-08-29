<?php

namespace App\Livewire;

use App\Models\Conyuge;
use App\Models\Empresa;
use App\Models\Gremio;
use App\Models\Hijo;
use App\Models\Sectore;
use App\Models\User;
use App\Rules\UniqueDocument;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class RegisterUser extends Component
{

  public $method=0;
  public $emailSession;

  public $name;
  public $apellido;
  public $documento;
  public $genero;
  public $fechaNac;
  public $direccion;
  public $telefono;
  public $telefonoLaboral;
  public $email;
  public $legajo;

  public $conyugue=0;
  public $hijos=0;  
  public $password;
  public $password_confirmation;
  public $fechaAfiliacion;

  public $localidad;
  public $empresas;
  public $empresaId;
  public $sectores;
  public $sectorId=0;
  public $gremios;
  public $gremioId;
  
  public $nombreConyugue;
  public $apellidoConyugue;
  public $documentoConyugue;
  public $generoConyugue;
  public $fechaNacConyugue;

  public $hijosData=[];

  protected function rules(){
       $rules  =  [                  
            'name' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'documento' => 'required|unique:users', 
            'genero' => 'required',         
            'fechaNac' => 'required',         
            'direccion' => 'required',         
            'telefono' => 'required',         
            'email' => 'required|unique:users|email',         
            'password' => 'required|string|confirmed|min:8',         
            'hijos' => 'required|integer',  
            'gremioId' => 'required|integer',  

            'empresaId' => 'required',  
          ]; 
                    
          if($this->conyugue == 1  ){ 
            $rules['nombreConyugue'] = 'required';
            $rules['apellidoConyugue'] = 'required';
            $rules['documentoConyugue'] = ['required', new UniqueDocument];
            $rules['generoConyugue'] = 'required';
            $rules['fechaNacConyugue'] = 'required';
           }
                      

            for ($i = 0; $i < $this->hijos; $i++) {
                $rules["hijosData.$i.nombre"]   = 'required';
                $rules["hijosData.$i.apellido"]  = 'required';
                $rules["hijosData.$i.genero"]    = 'required';
                $rules["hijosData.$i.documento"] = ['required', new UniqueDocument];
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
            "idRol.required"=> "Elijo un tipo.",
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
            
            "hijosData.*.nombre" => "Ingrese nombre.",
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
    


      
     public function mount(){      
      $this->empresas=Empresa::orderBy("nombreEmpresa","asc")->get();
      $this->sectores=Sectore::orderBy("nombreSector","asc")->get();
      $this->gremios=Gremio::orderBy("nombreGremio","asc")->get();

      $this->hijosData = array_fill(0, $this->hijos, [
            'documento' => '',            
            'apellido' => '',
            'nombre' => '',
            'genero' => '',            
            'fechaNac' => '',            
        ]);


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
          "legajo"=>$this->legajo,
          
          "idEmpresa" =>$this->empresaId,
          "idGremio" =>$this->gremioId,
          "idSector" =>$this->sectorId,
          "password" =>bcrypt($this->password),
           
          "idRol" =>2, //usuario pendiente de revision 
          "estado" =>0,                     
        ]);

        
        $miembro->syncRoles("UsuarioPendienteRevision");

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
        

        if($miembro){
          $this->emailSession = $this->email;
          $this->resetForm();
          $this->method=1;
        }
        

     }

     public function resetForm(){
        $this->reset([
            'name',
            'apellido',
            'documento',
            'genero',
            'legajo',
            'fechaNac',
            'direccion',
            'telefono',
            'telefonoLaboral',
            'email',
            'localidad',
            'fechaAfiliacion',
            'empresaId',
            'gremioId',
            'sectorId',            
            'password',
            'hijos',
            'conyugue'
        ]);

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
  

    public function render()
    {      
        return view('livewire.register-user');
    }
}
