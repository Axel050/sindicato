<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DocumentosRequerido
 * 
 * @property int $id
 * @property string $tipoDoc
 * @property string $nombreDoc
 * @property string $rutaDoc
 * @property Carbon|null $fechaRegistro
 * @property int|null $idResponsable
 * @property int|null $idBeneficio
 * @property string|null $estado
 * @property string|null $observacion
 *
 * @package App\Models
 */
class DocumentosRequerido extends Model
{
	protected $table = 'documentos_requeridos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'idBeneficio' => 'int'
	];

	protected $fillable = [
		'tipoDoc',
		'nombreDoc',
		'rutaDoc',
		'fechaRegistro',
		'idResponsable',
		'idBeneficio',
		'estado',
		'observacion'
	];
}
