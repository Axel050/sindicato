<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Beneficio
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property Carbon|null $fechaCreacion
 * @property Carbon|null $fechaRegistro
 * @property int|null $idResponsable
 * @property string|null $fechaDesde
 * @property string|null $fechaHasta
 * @property string|null $estado
 * @property string $reutilizable
 * @property int $cantUsos
 * @property int $nroBeneficio
 * @property string $condiciones
 * @property string $bannerBeneficio
 *
 * @package App\Models
 */
class Beneficio extends Model
{
	protected $table = 'beneficios';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'fechaCreacion' => 'datetime',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'cantUsos' => 'int',
		'nroBeneficio' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'fechaCreacion',
		'fechaRegistro',
		'idResponsable',
		'fechaDesde',
		'fechaHasta',
		'estado',
		'reutilizable',
		'cantUsos',
		'nroBeneficio',
		'condiciones',
		'bannerBeneficio'
	];
}
