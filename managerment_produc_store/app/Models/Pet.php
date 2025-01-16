<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'store_id',
        'pet_name',
        'pet_species',
        'pet_breed',
        'pet_age'  
    ];


    public function store()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

}
