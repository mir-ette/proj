<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class Experience extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'last_job',
        'company',
        'about_job',
        'last_salary',
        'job_hours',
        'from',
        'to',
        'period',
        'transportation',
        'insurance',
        'commission',
        'employee_id'
    ];
    public function employee() { 
        return $this->belongsTo(Employee::class);
       }
}
