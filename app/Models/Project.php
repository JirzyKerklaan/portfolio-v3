<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['year', 'client', 'description', 'role'];

    protected $casts = [
        'year' => 'date',
    ];
}
