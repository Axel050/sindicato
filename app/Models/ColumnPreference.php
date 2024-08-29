<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColumnPreference extends Model
{
    use HasFactory;

    protected $table="column_preference";

    protected $fillable = [
		'user_id',
		'columns',		
	];


   public function user()
    {
        return $this->belongsTo(User::class);
    }
}
