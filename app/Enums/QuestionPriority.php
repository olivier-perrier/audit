<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum QuestionPriority: string implements HasLabel, HasColor
{
    case P0 = 'very_high';
    case P1 = 'high';
    case P2 = 'medium';
    case P3 = 'low';

    public function getLabel(): string
    {
        return match ($this) {
            self::P0 => 'Critique',
            self::P1 => 'Très haut',
            self::P2 => 'Moyenne',
            self::P3 => 'Faible',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::P0 => 'danger',
            self::P1 => 'danger',
            self::P2 => 'warning',
            self::P3 => 'success',
        };
    }
}
