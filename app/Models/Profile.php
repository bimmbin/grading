<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'section_id',
        'studentno',
        'employeeno',
        'firstname',
        'lastname',
        'middlename',
        'sex',
        'year',
        'course',
        'department',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function section() {
        return $this->belongsTo(Section::class);
    }
    public function loading() {
        return $this->hasMany(Loading::class);
    }
    public function grade() {
        return $this->hasMany(Grade::class);
    }
}
