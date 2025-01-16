<?php

namespace App\Livewire\Admin\Requerimientos;

use App\Models\EstadoCondicionesRequerida;
use App\Models\EstadoCondicionRequeridaAfiliado;
use Livewire\Component;
use Illuminate\Http\UploadedFile;
use Livewire\Attributes\On;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Modal extends Component
{

    use WithFileUploads;

    public $title;
    public $id;
    public $bg;    
    public $method;
    public $methodModal;
    public $btnText;    
        
    public $valor;
    public $condicion;
    public $nombre;
    public $dni;
    public $requerimiento;
    public $estado;
    public $quitar;

    public $file;
     public $filePath; 

     public $fileType;       // Tipo de archivo ('image' o 'pdf')
    public $filePreview;  

    protected function rules(){
       return [                  
          'file' => 'max:20480',
        ];          
     }

    protected function messages(){
       return [                      
            "file.required" => "Campo requerido.",                        
            "file.max" => "No debe superar los 20MB.",                        
          ];                 
      }
    
      public function fresh(){
      }
      
      
      #[On(['miembroReqUpdated' ] )]
    public function mount()
    {        
      $this->methodModal=false;
        if($this->method == "update"){   
              $this->condicion = EstadoCondicionesRequerida::find($this->id);
                            
              $this->requerimiento =  $this->condicion->requerimiento->nombreRequerimiento ;
              $this->nombre =  $this->condicion->user->name ." ". $this->condicion->user->apellido;
              $this->dni =  $this->condicion->user->documento ;
              $this->estado =  $this->condicion->estado;
              $this->valor =  $this->condicion->valor;
              $this->file =  $this->condicion->valor; 

              $this->title= "Editar";
              $this->btnText= "Guardar";          
              $this->bg="background-color: rgb(234 88 12)";
            }
            elseif($this->method == "delete"){              
              $this->condicion = EstadoCondicionesRequerida::find($this->id);
              $this->nombre =  $this->condicion->user->name ." ". $this->condicion->user->apellido;
              $this->requerimiento =  $this->condicion->requerimiento->nombreRequerimiento ;                                          
              $this->title= "Eliminar";
              $this->btnText= "Eliminar";          
              $this->bg=	"background-color: rgb(239 68 68)"; 
            }
                
    }
      

public function updatedFile()
{
    $this->validate([
        'file' => 'file|max:20480', // Incluye validación para PDFs
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

        $this->quitar=0;
    }
}


    public function update(){
                          
      $this->validate(  $this->rules(), $this->messages());              

        if ($this->file instanceof UploadedFile) {
        // Guarda el archivo y obtén la ruta
        $filePath = $this->file->store('requerimientos', 'public'); // Guarda en el disco "public" dentro de "uploads"

        // Asigna la ruta al modelo
        $this->condicion->valor = $filePath;
      }
      elseif($this->quitar){
        $this->condicion->valor = '';
      }

      $this->condicion->estado = $this->estado;

      $this->condicion->save();


      $condiciones = EstadoCondicionesRequerida::where("idCondicionRequerida",$this->condicion->idCondicionReq )->where("idMiembro",$this->condicion->idMiembro)->get();

            // Log::alert([
            //   "idcon" => $this->condicion->idCondicionReq,
            //   "idcMMMMon" => $this->condicion->idMiembro,
            // ]);
            // Log::alert("----");
            // Log::alert($condiciones);

              foreach ($condiciones as $c) {
                $c->estado=$this->condicion->estado;
                $c->save();                
              }

      $this->dispatch('condicionReqMieUpdated');   
          
    }


    public function clear(){

      $this->quitar=1;
      $this->valor="";
      $this->file="";
      $this->filePreview="";
    }

    public function delete(){
      
    // $this->condicion->delete();
      $this->condicion->forceDelete(); 
      $this->dispatch('condicionReqMieDeleted');   

    }
       

    public function render()
    {
        return view('livewire.admin.requerimientos.modal');
    }
}
