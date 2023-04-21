<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loading extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'subject_id',
        'section_id', 
        
        'status',
        // 'school_year_id', 
       
    ];

    public function profile() {
        return $this->belongsTo(Profile::class);
    }
    public function subject() {
        return $this->belongsTo(Subject::class);
    }
    public function section() {
        return $this->belongsTo(Section::class);
    }
    public function grade() {
        return $this->hasOne(Grade::class);
    }
    public function requestchange() {
        return $this->hasOne(Requestchange::class);
    }
}
