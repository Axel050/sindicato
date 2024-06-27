<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BeneficioAfiliado
 * 
 * @property int $id
 * @property int|null $idBeneficio
 * @property int|null $idAfiliado
 * @property Carbon|null $fechaRegistro
 * @property int|null $idResponsable
 * @property int|null $estado
 * @property string|null $comentario
 * @property string|null $fechaDesde
 * @property string|null $fechaHasta
 * @property string|null $reutilizable
 * @property int|null $cantUsos
 *
 * @package App\Models
 */
class BeneficioAfiliado extends Model
{
	protected $table = 'beneficio_afiliados';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idBeneficio' => 'int',
		'idAfiliado' => 'int',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'estado' => 'int',
		'cantUsos' => 'int'
	];

	protected $fillable = [
		'idBeneficio',
		'idAfiliado',
		'fechaRegistro',
		'idResponsable',
		'estado',
		'comentario',
		'fechaDesde',
		'fechaHasta',
		'reutilizable',
		'cantUsos'
	];
}
