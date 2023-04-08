<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_year',
        'subject_code',
        'subject_description',
     
    ];
    
    public function loading() {
        return $this->hasOne(Loading::class);
    }
}
