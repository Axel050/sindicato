<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Illuminate\Support\Collection;

class MiembrosExport implements FromCollection, WithHeadings, WithStyles
{
  protected $miembros;
 protected $encabezados;

 

      public function __construct(Collection $miembros, array $encabezados)
    {
      $this->miembros = $miembros;
        $this->encabezados = $encabezados;
      }

      /**
      * @return \Illuminate\Support\Collection
      */
        public function collection()
    {
        return $this->miembros;
    }
      

      /**
     * Define las cabeceras del archivo Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return $this->encabezados;
    }


     /**
     * Estilos para las hojas de Excel.
     *
     * @param Worksheet $sheet
     * @return array
     */
      public function styles(Worksheet $sheet)
    {
        return [
            // Aplica negrita a la primera fila (los encabezados)
            1 => ['font' => ['bold' => true]],
        ];
    }

    

}
