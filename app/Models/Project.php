<?php

namespace App\Models;

use App\Enums\ProjectRoleEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $fillable = ['slug', 'year', 'client', 'title', 'short_description', 'role', 'cover_img', 'mockup_img', 'color', 'url', 'description', 'overview', 'outcome', 'archived', 'seo_title', 'seo_description'];

    protected $casts = [
        'year' => 'date',
        'role' => ProjectRoleEnum::class,
        'archived' => 'boolean',
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
