<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name',
        'address',
        'governorate',
        'email',
        'wsp',
        'phone_no',
        'post_date',
        'servant_dealer',
        'user_id',
    ];
    public function user() { 
        return $this->belongsTo(User::class);
       }
}
