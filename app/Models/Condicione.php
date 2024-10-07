<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Condicione
 * 
 * @property int $id
 * @property string $nombreCondicion
 * @property string|null $descripcionCondicion
 * @property Carbon|null $fechaRegistro
 * @property int|null $idResponsable
 * @property int $estado
 *
 * @package App\Models
 */
class Condicione extends Model
{
	protected $table = 'condiciones';
	// public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'estado' => 'int'
	];

	protected $fillable = [
		'nombreCondicion',
		'descripcionCondicion',
		'fechaRegistro',
		'idResponsable',
		'estado'
	];
}
