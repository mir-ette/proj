<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\User;
class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'status',
        'no_of_req_emp',
        'create_at',
        'notes',
        'job',
        'requirements',
        'salary',
        'insurance',
        'transportation',
        'where to post',
        'commission',
        'code',
        'user_id',
        'comp_id'

    ];
    public function user() { 
        return $this->belongsTo(User::class);
       }
       public function company() { 
        return $this->belongsTo(Company::class);
       }  
}
