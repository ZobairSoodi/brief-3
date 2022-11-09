<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brief extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_brief'; 
    public $timestamps = false;
    public function tasks(){
        return $this->hasMany(Task::class, 'id_brief', 'id_brief');
    }
}
