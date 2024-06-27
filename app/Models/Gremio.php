<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gremio
 * 
 * @property int $id
 * @property string $nombreGremio
 * @property string|null $descripcionGremio
 * @property Carbon|null $fechaRegistro
 * @property int|null $idResponsable
 * @property int $estado
 *
 * @package App\Models
 */
class Gremio extends Model
{
	protected $table = 'gremios';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'estado' => 'int'
	];

	protected $fillable = [
		'nombreGremio',
		'descripcionGremio',
		'fechaRegistro',
		'idResponsable',
		'estado'
	];
}
