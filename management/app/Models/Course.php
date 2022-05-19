<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'education',
        'grade',
        'graduation_year',
        'certifications',
        'name_of_courses',
        'got_certificate',
        'date_of_certificate',
        'centrename_of_givencourse',
        'start_course',
        'skills_aquired',
        'projects',
        'employee_id',
        
    ];
     public function employee() { 
         return $this->belongsTo(Employee::class);
        }
}
