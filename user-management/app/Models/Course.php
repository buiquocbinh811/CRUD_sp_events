<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model  // Sửa từ User thành Course
{
    protected $fillable = [
        'name',
        'description', 
        'difficulty',
        'price',
        'start_date'
    ];
    
    protected $casts = [
        'start_date' => 'date'
    ];
}