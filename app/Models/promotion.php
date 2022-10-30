<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apprenant;

class promotion extends Model
{
    
    
    public function apprenants(){
        return $this->hasMany(Apprenant::class, 'promo_id');
    }
}
