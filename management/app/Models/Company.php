<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servant;
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
        'servant_id',
    ];
    public function servant() { 
        return $this->belongsTo(Servant::class);
       }
}
