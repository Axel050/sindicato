<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hijo
 * 
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string|null $fNac
 * @property string|null $sexo
 * @property string|null $dni
 * @property int|null $idPadre
 * @property Carbon|null $fechaRegistro
 * @property int|null $idResponsable
 * @property int $estado
 *
 * @package App\Models
 */
class Hijo extends Model
{
	protected $table = 'hijos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idPadre' => 'int',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'estado' => 'int'
	];

	protected $fillable = [
		'id',
		'nombre',
		'apellido',
		'fNac',
		'sexo',
		'dni',
		'idPadre',
		'fechaRegistro',
		'idResponsable',
		'estado'
	];
}
