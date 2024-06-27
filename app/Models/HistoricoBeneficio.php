<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HistoricoBeneficio
 * 
 * @property int $id
 * @property int $idMiembro
 * @property int $idBeneficio
 * @property int $idBeneficioAfiliado
 * @property string $fechaRegistro
 * @property int $idResponsable
 *
 * @package App\Models
 */
class HistoricoBeneficio extends Model
{
	protected $table = 'historico_beneficios';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idMiembro' => 'int',
		'idBeneficio' => 'int',
		'idBeneficioAfiliado' => 'int',
		'idResponsable' => 'int'
	];

	protected $fillable = [
		'id',
		'idMiembro',
		'idBeneficio',
		'idBeneficioAfiliado',
		'fechaRegistro',
		'idResponsable'
	];
}
