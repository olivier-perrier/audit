<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum QuestionPriority: string implements HasLabel, HasColor
{
    case P0 = 'low';
    case P1 = 'medium';
    case P2 = 'high';
    case P3 = 'very_high';

    public function getLabel(): string
    {
        return match ($this) {
            self::P0 => 'P0',
            self::P1 => 'P1',
            self::P2 => 'P2',
            self::P3 => 'P3',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::P0 => 'success',
            self::P1 => 'warning',
            self::P2 => 'danger',
            self::P3 => 'danger',
        };
    }
}
