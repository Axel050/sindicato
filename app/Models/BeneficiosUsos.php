<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeneficiosUsos extends Model
{
    use HasFactory, SoftDeletes;

     protected $fillable = ['id_beneficio', 'id_miembro', 'fecha_uso'];

    public function beneficio()
    {
        return $this->belongsTo(Beneficio::class);
    }

    public function miembro()
    {
        return $this->belongsTo(User::class,"id_miembro");
    }

    
}
