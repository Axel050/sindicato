<?php

namespace App\Livewire\Admin\Guest;

use App\Models\BeneficioAfiliado;
// use BaconQrCode\Encoder\QrCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Endroid\QrCode\QrCode as QrCodeQrCode;
use Livewire\Component;



                        use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class Activos extends Component
{

  public $qrC;

  public function generateQR($id,$idB){
    // $url = route('miembro-beneficios', ['id' => $ben->id, 'idB' => $ben->beneficio->id]);
    // $url = route('miembro-beneficios', ['id' => 410, 'idB' => 5]);
    $url = "https://www.google.com.ar/";
                        // qr = generateQR($ben->idAfiliado, 'idB' => $ben->beneficio->id);
                        // $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($url);

                        //  $url = route('miembro-beneficios', ['id' => $id, 'idB' => $idB]);

                        // $this->qrC = QrCode::size(200)->generate($url);
                        // $this->qrC = QrC


                        // $qrCode = new QrCodeQrCode('Contenido del QR');  $qrCode->writeFile('path/donde/guardar/el/qr.png');


$qrCodeResult = Builder::create()
    ->writer(new PngWriter()) // Indica el formato de salida
    ->data($url ) // Contenido del QR
    ->build(); // Genera el código QR


      $this->qrC= $qrCodeBase64 = base64_encode($qrCodeResult->getString());

// Guardar el código QR en un archivo
// $qrCodeResult->saveToFile('path/donde/guardar/el/qr.png');

// También puedes devolver la imagen directamente al navegador
// header('Content-Type: '.$qrCodeResult->getMimeType());

                        
                        // dd($qr);
                        // dd([
                        //   "id" => $id,
                        //   "idB" => $idB
                        // ]);
  }


    public function render()
    {


      $id = auth()->user()->id;

      // dd($id);

    //   $beneficios = Beneficio::with('beneficioCondiciones.condicionReq')
    // ->whereHas('beneficioCondiciones', function ($query) use ($idCondicion) {
    //     $query->whereRaw("FIND_IN_SET(?, REPLACE(condiciones, '-', ','))", [$idCondicion]);
    // })
    
    //  ->where(function ($query) use ($hoy) {
    //     $query->where(function ($q) use ($hoy) {
    //         $q->whereDate('fechaDesde', '<=', $hoy)
    //           ->whereDate('fechaHasta', '>=', $hoy);
    //     })
    //     ->orWhereNull('fechaDesde')
    //     ->orWhereNull('fechaHasta');
    // })
    // ->where("estado",1)

        $hoy=Carbon::now();

        // CREO QUE VA BIEN ARREGLAR COMO SE GUARDAN FECHAS NULL AL CREAR BENEFICIO 
// $beneficios = BeneficioAfiliado::where('idAfiliado', $id)
//     ->whereHas('beneficio', function ($query) use ($hoy) {
//         $query->where('estado', 1)  // Solo beneficios con estado = 1
//               ->where(function ($q) use ($hoy) {
//                   // Agrupamos las condiciones de fechas correctamente
//                   $q->where(function ($q2) use ($hoy) {
//                       // Caso 1: Fecha actual entre fechaDesde y fechaHasta
//                       $q2->whereDate('fechaDesde', '<=', $hoy)
//                          ->whereDate('fechaHasta', '>=', $hoy);
//                   })
//                   // Caso 2: uno o ambos campos son nulos
//                   ->orWhere(function ($q3) {
//                       $q3->whereNull('fechaDesde')
//                          ->WhereNull('fechaHasta');
//                   });
                  
//               });
//     })
                            
//                             ->with('beneficio')
//                             ->get();
$beneficios = BeneficioAfiliado::where('idAfiliado', $id)
    ->whereHas('beneficio', function ($query) use ($hoy) {
        $query->where('estado', 1)  // Solo beneficios con estado = 1
              ->where(function ($q) use ($hoy) {
                  // Agrupamos las condiciones de fechas correctamente
                  $q->where(function ($q2) use ($hoy) {
                      // Caso 1: Fecha actual entre fechaDesde y fechaHasta
                      $q2->whereDate('fechaDesde', '<=', $hoy)
                         ->whereDate('fechaHasta', '>=', $hoy);
                  })
                  // Caso 2: Ambos campos son nulos
                  ->orWhere(function ($q3) {
                      $q3->whereNull('fechaDesde')
                         ->whereNull('fechaHasta');
                  })
                  // Caso 3: Uno de los campos es nulo y el otro se compara con la fecha de hoy
                  ->orWhere(function ($q4) use ($hoy) {
                      $q4->where(function ($q5) use ($hoy) {
                          $q5->whereNull('fechaDesde')
                             ->whereDate('fechaHasta', '>=', $hoy);
                      })
                      ->orWhere(function ($q6) use ($hoy) {
                          $q6->whereNull('fechaHasta')
                             ->whereDate('fechaDesde', '<=', $hoy);
                      });
                  });
              });
    })
    ->with('beneficio')
    ->get();


    $this->generateQR(410,5);



        return view('livewire.admin.guest.activos', compact("beneficios"));
    }
}


  // public function verificarBeneficio()
  //   {
  //       $beneficioAfiliado = BeneficioAfiliado::where('idAfiliado', $this->idAfiliado)
  //           ->where('idBeneficio', $this->idBeneficio)
  //           ->first();

  //       if ($beneficioAfiliado && !$beneficioAfiliado->puedeUsarse()) {
  //           $this->beneficioDisponible = false;
  //           $this->mensaje = 'El beneficio ya no puede ser usado.';
  //       } else {
  //           $this->beneficioDisponible = true;
  //           $this->mensaje = '';
  //       }
  //   }

  //   public function usarBeneficio()
  //   {
  //       $beneficioAfiliado = BeneficioAfiliado::where('idAfiliado', $this->idAfiliado)
  //           ->where('idBeneficio', $this->idBeneficio)
  //           ->first();

  //       if (!$beneficioAfiliado) {
  //           $this->mensaje = 'Beneficio no encontrado.';
  //           return;
  //       }

  //       if (!$beneficioAfiliado->puedeUsarse()) {
  //           $this->beneficioDisponible = false;
  //           $this->mensaje = 'El beneficio ya no puede ser usado.';
  //           return;
  //       }

  //       // Usar el beneficio incrementando el contador de usos
  //       $beneficioAfiliado->increment('usos');

  //       $this->mensaje = 'Beneficio usado correctamente.';
  //       $this->beneficioDisponible = false;

  //       // Verificar de nuevo el beneficio después de usarlo
  //       $this->verificarBeneficio();
  //   }