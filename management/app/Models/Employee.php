<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Experience;
use App\Models\User;
class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'nationality',
        'email',
        'phone-no',
        'full_name',
        'church_name',
        'wsp',
        'gender',
        'marital_status',
        'age',
        'birthdate',
        'address',
        'area',
        'national_id',
        'passport_number',
        'notes',
       

    ];


     public function  courses() {
        return $this->hasMany( Course::class);
    }
    
    public function  experience() {
        return $this->hasMany( Experience::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
