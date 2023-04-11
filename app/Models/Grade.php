<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [       
        'loading_id',
        'profile_id',
        // 'school_year_id',
        'prelim',
        'midterm',
        'finals',
        'fg',
        'ng',
        'remarks',
    ];

    public function loading() {
        return $this->belongsTo(Loading::class);
    }
    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
