<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_name',
        'course_year',
     
    ];

    public function loading() {
        return $this->hasOne(Loading::class);
    }
    public function profile() {
        return $this->hasOne(Profile::class);
    }
}
