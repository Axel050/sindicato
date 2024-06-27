<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modulo
 * 
 * @property int $id
 * @property string $titulo
 * @property string $descripcion
 * @property int $status
 *
 * @package App\Models
 */
class Modulo extends Model
{
	protected $table = 'modulo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'id',
		'titulo',
		'descripcion',
		'status'
	];
}
