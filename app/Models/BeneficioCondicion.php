<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BeneficioCondicion
 * 
 * @property int $id
 * @property int $idBeneficio
 * @property int $idCondicion
 * @property string $descripcion
 * @property Carbon $fechaRegistro
 * @property int $idResponsable
 * @property int $estado
 *
 * @package App\Models
 */
class BeneficioCondicion extends Model
{
	protected $table = 'beneficio_condicion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idBeneficio' => 'int',
		'idCondicion' => 'int',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'estado' => 'int'
	];

	protected $fillable = [
		'idBeneficio',
		'idCondicion',
		'descripcion',
		'fechaRegistro',
		'idResponsable',
		'estado'
	];
}
