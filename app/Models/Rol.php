<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $id
 * @property string $nombrerol
 * @property string $descripcion
 * @property int $status
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rol';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'id',
		'nombrerol',
		'descripcion',
		'status'
	];
}
