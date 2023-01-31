<?php

namespace App\Models;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'gender',
        'class_id'
    ];


    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }


}
