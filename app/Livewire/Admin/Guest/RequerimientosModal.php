<?php

namespace App\Livewire\Admin\Guest;

use App\Models\EstadoCondicionesRequerida;
use App\Models\EstadoCondicionRequeridaAfiliado;
use Livewire\Component;
use App\Models\Gremio;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class RequerimientosModal extends Component
{

    use WithFileUploads;
    

    public $title;
    public $id;
    public $bg;    
    public $method;
    public $btnText;    
        
    public $gremio;
    public $nombreGremio;
    public $direccionEmpresa;
    public $fechaRegitro;
    public $idResponsable;
    public $direccion;
    public $telefono;
    public $email;
    public $estado=1;
    public $descripcionGremio;

    public $valor;
    public $condicion;
    public $nombre;

    public $file;
     public $filePath; 

     public $fileType;       // Tipo de archivo ('image' o 'pdf')
    public $filePreview;  

    protected function rules(){
       return [                  
          'file' => 'required|max:20480',
        ];          
     }

    protected function messages(){
       return [                      
            "file.required" => "Campo requerido.",                        
            "file.max" => "No debe superar los 20MB.",                        
          ];                 
      }
    
  
    public function mount()
    {        
                                                 
        if($this->method == "update"){              
              //  $this->condicion = EstadoCondicionRequeridaAfiliado::find($this->id);
               $this->condicion = EstadoCondicionesRequerida::find($this->id);
                           
              $this->nombre =  $this->condicion->requerimiento?->nombreRequerimiento ;
              $this->file =  $this->condicion->valor ;
              
              $this->title= "Editar";
              $this->btnText= "Guardar";          
              $this->bg="background-color: rgb(234 88 12)";

              
            }
                
    }
      
    
    






public function updatedFile()
{
    $this->validate([
        'file' => 'required|file|mimes:jpeg,png,jpg,pdf|max:20480', // Incluye validación para PDFs
    ]);

    if ($this->file) {
        $this->filePreview = $this->file->temporaryUrl(); // URL temporal del archivo

        $mimeType = $this->file->getMimeType();
        if (str_contains($mimeType, 'image')) {
            $this->fileType = 'image';
        } elseif ($mimeType === 'application/pdf') {
            $this->fileType = 'pdf';
        } else {
            $this->fileType = null; // Archivo no compatible
        }
    }
}

    public function update(){
                          

      
      $this->validate(  $this->rules(), $this->messages());              

        if ($this->file instanceof UploadedFile) {      
        $filePath = $this->file->store('requerimientos', 'public'); // Guarda en el disco "public" dentro de "uploads"

        
        $this->condicion->valor = $filePath;
        $this->condicion->estado = 2;
        $this->condicion->fechaRegistro = Carbon::now()->format('Y-m-d'); 
        $this->condicion->save();




    }

            $condiciones = EstadoCondicionesRequerida::where("idCondicionRequerida",$this->condicion->idCondicionReq )->where("idMiembro",$this->condicion->idMiembro)->get();

            Log::alert([
              "idcon" => $this->condicion->idCondicionReq,
              "idcMMMMon" => $this->condicion->idMiembro,
            ]);
            Log::alert("----");
            Log::alert($condiciones);

              foreach ($condiciones as $c) {
                $c->estado=2;
                $c->save();                
              }


      $this->dispatch('condicionReqUpdated');   

      
      
    }


       

    public function render()
    {
        return view('livewire.admin.guest.requerimientos-modal');
    }
}
