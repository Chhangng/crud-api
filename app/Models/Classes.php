<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'class_dep'
    ];

    public function students()
    {
         return $this->hasMany(Student::class);
    }
}
