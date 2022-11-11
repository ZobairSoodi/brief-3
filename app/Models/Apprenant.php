<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    

    public function promotion(){
        return $this->belongsTo(promotion::class, 'promo_id');
    }

    public function briefs(){
        return $this->belongsToMany(Brief::class, 'brief_student', 'id_appr', 'id_brief');
    }
}
