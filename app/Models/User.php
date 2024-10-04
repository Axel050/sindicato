<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    use HasRoles;
    use HasPermissions;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'apellido',
        'telefono',
        'idRol',
        'estado',
        'sexo',
        'localidad',
        'idSector',
        'idEmpresa',
        'idGremio',
        'idRol',
        'direccion',
        'telefonoLaboral',
        'fNac',
        'fechaAfiliacion',
        'documento',
        'idCondicion'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

     public function role()
    {
        return $this->belongsTo(Role::class, 'idRol');
    }

     public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }

     public function sector()
    {
        return $this->belongsTo(Sectore::class, 'idSector');
    }

     public function gremio()
    {
        return $this->belongsTo(Gremio::class, 'idGremio');
    }

    public function hijos()
{
    return $this->hasMany(Hijo::class, 'idPadre');
}

public function conyuge()
{
    return $this->hasOne(Conyuge::class, 'idConyuge');
}

public function condicion()
{
     return $this->belongsTo(Condicione::class, 'idCondicion');
    // return $this->hasOne(Condicione::class, 'idCondicion');
}

       public function columnPreference()
    {
        return $this->hasOne(ColumnPreference::class);
    }

}
