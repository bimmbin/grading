<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'loading_id',
        'remarks',
       
    ];
    
    public function loading() {
        return $this->belongsTo(Loading::class);
    }
}
