<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conyuge extends Model
{
    use HasFactory;

    protected $fillable = [
		'id',
		'nombre',
		'apellido',
		'documento',
		'fNac',
		'sexo',
		'idConyuge',			
	];

}
