<?php

namespace App\Exports;

use DateTime;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Sheet;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
          use PhpOffice\PhpSpreadsheet\Style\Fill;

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
    $rows = [];

    foreach ($this->miembros as $miembro) {
        $hijos = $miembro['hijos'];
        $first = true;

        foreach ($hijos as $hijo) {
            $row = [];

            foreach ($this->encabezados as $column) {              


                 if ($column == 'hijoNombre') {
                    $row[$column] = '- ' . $hijo['nombre'];
                } elseif ($column == 'hijoDni') {
                    $row[$column] = '- ' . $hijo['dni'];
                } elseif ($column == 'hijoApellido') {
                    $row[$column] = '- ' . $hijo['apellido'];
                } elseif ($column == 'hijoGenero') {
                    $row[$column] = $hijo['sexo'] == "F" ? "Mujer" : ($hijo['sexo'] == "M" ? "Hombre" : "") ;
                } elseif ($column == 'hijoEdad') {
                    $birthDate = new DateTime($hijo->fNac);
                    $currentDate = new DateTime();
                    $ageInYears = $currentDate->diff($birthDate)->y;
                    $ageInMonths = $currentDate->diff($birthDate)->m + ($ageInYears * 12);
                        if ($ageInYears < 1) {
                            // Si la edad es menor que un año, mostramos la edad en meses
                            $row[$column] = $ageInMonths . ' meses';
                        } else {
                            // Si la edad es mayor o igual a un año, mostramos la edad en años
                            $row[$column] = $ageInYears . ' años';
                        }

                } else {
                    // Si es la primera fila para este miembro, colocamos los datos, si no, dejamos en blanco
                    // $row[$column] = $first ? $miembro[$column] : '';

                  if ($column == 'hijosCant') {
                        $row[$column] = $first ? $hijos ->count() : '' ;    
                  }

                  elseif ($column == "conyuge") {
                          $row[$column] =$first ?  ($miembro['conyuge'] ? "Si" : "No") : '';                         
                  }
                  elseif ($column == "conyugeDni") {
                          $row[$column] =$first ? $miembro['conyuge']?->documento : '';    
                  }
                  elseif ($column == "conyugeNom") {
                          $row[$column] = $first ? $miembro['conyuge']?->nombre : '';    
                  }
                  elseif ($column == "conyugeApe") {
                          $row[$column] = $first ? $miembro['conyuge']?->apellido : '';    
                  }                  
                  elseif ($column == "estado") {
                          $row[$column] = $first ? ($miembro['estado'] ? 'Activo' : 'Inactivo') : '';    
                  }
                  elseif ($column == "empresa") {
                          $row[$column] =$first ? $miembro['empresa']?->nombreEmpresa : '';    
                  }
                  elseif ($column == "gremio") {
                          $row[$column] =$first ? $miembro['gremio']?->nombreGremio : '';    
                  }
                  elseif ($column == "sector") {
                          $row[$column] =$first ? $miembro['sector']?->nombreSector : '';    
                  }
                  elseif ($column == "condicion") {
                          $row[$column] =$first ? $miembro['condicion']?->nombreCondicion : '';    
                  }

                  else {
                    # code...
                    $row[$column] = $first ? $miembro[$column] : '';
                  }
                }
            }

            $rows[] = $row;
            $first = false;
        
       } //endfor hijos




        // Si no tiene hijos, igualmente añadimos la fila con los datos del miembro
        if ($hijos->isEmpty()) {
            $row = [];

            foreach ($this->encabezados as $column) {

              
              

              if ($column == "conyuge") {
                          $row[$column] = $miembro['conyuge'] ? "Si" : "No";                                                   
                  }
                  elseif ($column == "conyugeDni") {
                          $row[$column] =$miembro['conyuge']?->documento;    
                  }
                  elseif ($column == "conyugeNom") {
                          $row[$column] =$miembro['conyuge']?->nombre;    
                  }
                  elseif ($column == "conyugeApe") {
                          $row[$column] =$miembro['conyuge']?->apellido;    
                  }
                  elseif ($column == "conyugeDni") {
                          $row[$column] =$miembro['conyuge']?->documento;    
                  }

                  elseif ($column == "estado") {
                          $row[$column] =$miembro['estado'] ? 'Activo' : 'Inactivo';    
                  }
                  elseif ($column == 'hijosCant') {
                        $row[$column] = $hijos ->count() ;    
                  }
                  elseif ($column == "empresa") {
                          $row[$column] = $miembro['empresa']?->nombreEmpresa ;    
                  }
                  elseif ($column == "gremio") {
                          $row[$column] = $miembro['gremio']?->nombreGremio ;    
                  }
                  elseif ($column == "sector") {
                          $row[$column] = $miembro['sector']?->nombreSector ;    
                  }
                  elseif ($column == "condicion") {
                          $row[$column] = $miembro['condicion']?->nombreCondicion ;    
                  }

                  else {
                    # code...
                    $row[$column] = $miembro[$column] ?? '';
                  }
       
                }

            $rows[] = $row;
        }        
    }

    return collect($rows);
}

     public function collection2()
    {
        return $this->miembros->map(function ($miembro) {
            $row = [];

            // Recorremos las columnas seleccionadas
            foreach ($this->encabezados as $column) {
                if ($column == 'hijoNombre') {
                    // Si es la columna hijoNombre, concatenamos los nombres de los hijos                    
                    $hijoNombres = $miembro['hijos']->pluck('nombre')->map(function($nombre) {
                                                  return '- ' . $nombre;
                                              })->implode("\n");
                    $row[$column] = $hijoNombres;
                }
                elseif ($column == 'hijoDni') {
                    // Si es la columna hijoNombre, concatenamos los nombres de los hijos
                    // $hijoNombres = $miembro['hijos']->pluck('nombre')->implode(', ');
                    $hijoNombres = $miembro['hijos']->pluck('dni')->map(function($dni) {
                                                  return '- ' . $dni ;
                                                   
                                              })->implode("\n");
                    $row[$column] = $hijoNombres ;
                }
                
                 else {
                    // Para las demás columnas, simplemente asignamos el valor
                    $row[$column] = $miembro[$column];
                }
            }

            return $row;
        });
    }

    /**
     * Define las cabeceras del archivo Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return $this->encabezados;
    //       return array_filter($this->encabezados, function($encabezado) {
    //     return $encabezado !== 'accion';
    // });
    }

    /**
     * Estilos para las hojas de Excel.
     *
     * @param Worksheet $sheet
     * @return array
     */
      public function styles(Worksheet $sheet)
    {
        
          $sheet->getStyle(1)->getFont()->setBold(true);
          $sheet->getRowDimension(1)->setRowHeight(25);         
          $sheet->getStyle(1)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    

        // Aplicar autoSize a todas las columnas
        foreach (range('A', $sheet->getHighestColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        return [];
    }


    

    /**
     * Map the row data to Excel.
     *
     * @param mixed $member
     * @return array
     */
    
}
