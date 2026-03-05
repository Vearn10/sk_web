<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Add this line below
    protected $fillable = [
        'title',
        'description',
        'event_date',
        'location',
    ];
}