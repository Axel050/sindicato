<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 * 
 * @property int $id
 * @property int $idRol
 * @property int $idModulo
 * @property int $r
 * @property int $w
 * @property int $u
 * @property int $d
 *
 * @package App\Models
 */
class Permiso extends Model
{
	protected $table = 'permisos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idRol' => 'int',
		'idModulo' => 'int',
		'r' => 'int',
		'w' => 'int',
		'u' => 'int',
		'd' => 'int'
	];

	protected $fillable = [
		'id',
		'idRol',
		'idModulo',
		'r',
		'w',
		'u',
		'd'
	];
}
