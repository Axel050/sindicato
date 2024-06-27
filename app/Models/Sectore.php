<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sectore
 * 
 * @property int $id
 * @property string $nombreSector
 * @property string|null $descripcionSector
 * @property Carbon|null $fechaRegistro
 * @property int|null $idResponsable
 * @property int $estado
 *
 * @package App\Models
 */
class Sectore extends Model
{
	protected $table = 'sectores';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'estado' => 'int'
	];

	protected $fillable = [
		'id',
		'nombreSector',
		'descripcionSector',
		'fechaRegistro',
		'idResponsable',
		'estado'
	];
}
