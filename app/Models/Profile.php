<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'studentno',
        'employeeno',
        'firstname',
        'lastname',
        'middlename',
        'sex',
        'year',
        'course',
        'section',
        'department_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
