<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'title', 'place', 'hotel', 'departure_date', 'return_date', 'price', 'description', 'capacity'
    ];
}
