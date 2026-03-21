<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $fillable = ['slug', 'year', 'client', 'title', 'description', 'long_text', 'role', 'image_url', 'color'];

    protected $casts = [
        'year' => 'date',
    ];

    protected $with = ['tools'];

    public function tools(): BelongsToMany
    {
        return $this->belongsToMany(
            Tool::class,
            'projects_tools',
            'project_id',
            'tool_id'
        )->orderBy('tool');
    }
}
