<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;
use Spatie\Permission\Commands\Show;
use Symfony\Component\HttpKernel\Profiler\Profile;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',        
        'email',
        'usuario',
        'ci',
        'addres',
        'password'  ,
        'username',
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

    /* ublic function adminlte_image(){
        return '';
    } */

    public function adminlte_image(){
        /* return asset('storage/'.$this->profile_photo_path) ?? asset('storage/defaultt.png'); */
        if ($this->profile_photo_path) {
            return asset('storage/'.$this->profile_photo_path);
        } else {
            // Ruta de la imagen por defecto
            return asset('storage/default.png');
        }
    }

    public function adminlte_desc(){
        $rol = $this->roles()->where($this->role_id)->first();
        /* dd($rol->name); */
        /* return 'Administrador'; */
        return $rol->name;
    }

    public function adminlte_profile_url(){
        return url('user/profile');
    }

    public function instalacion(){        
        return $this->hasMany('App\Models\Instalacion','user_id', 'id');
    }

    public function ejecutor(){        
        return $this->hasMany(Ejecutors::class);    
      }
}
