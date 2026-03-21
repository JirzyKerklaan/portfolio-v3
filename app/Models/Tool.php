<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tool extends Model
{
    protected $fillable = ['tool'];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'projects_tools', 'tool_id', 'project_id');
    }
}
