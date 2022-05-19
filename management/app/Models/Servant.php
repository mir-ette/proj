<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Application;
use App\Models\Company;
class Servant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'national_id',
        'wsp',
        'phone_no',
        'email',
        'role',
        'church_name',
       
    ];
    public function  applications() {
        return $this->hasMany( Application::class);
    }
    
    public function companies() {
        return $this->hasMany( Company::class);
    }
}
