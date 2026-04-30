<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum ProjectRoleEnum: string implements HasLabel
{
    case FULLSTACK_DEVELOPMENT = 'full-stack-development';
    case FRONTEND_DEVELOPMENT = 'front-end-development';
    case BACKEND_DEVELOPMENT = 'back-end-development';

    public function getLabel(): string | Htmlable | null
    {
        return match ($this) {
            self::FULLSTACK_DEVELOPMENT => "Full-stack development",
            self::FRONTEND_DEVELOPMENT => "Front-end development",
            self::BACKEND_DEVELOPMENT => "Backend development",
        };
    }
}
