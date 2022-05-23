<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\Servant as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
use App\Models\Company;

class Servant extends Model implements JWTSubject
{
    use HasFactory;
    protected $fillable = [
        'name',
        'national_id',
        'wsp',
        'phone_no',
        'email',
        'password',
        'role',
        'church_name',
       
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function  applications() {
        return $this->hasMany( Application::class);
    }
    
    public function companies() {
        return $this->hasMany( Company::class);
    }

// Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
