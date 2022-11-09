<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_task';
    public $timestamps = false;
    public function brief(){
        return $this->belongsTo(Brief::class, 'id_brief', 'id_brief');
    }
}
