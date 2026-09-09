<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum QuestionImpact: string implements HasLabel, HasColor
{
    case Low = 'low';
    case Medium = 'medium';
    case High = 'high';
    case VeryHigh = 'very_high';

    public function getLabel(): string
    {
        return match ($this) {
            self::Low => 'Faible',
            self::Medium => 'Moyenne',
            self::High => 'Élevée',
            self::VeryHigh => 'Très élevée',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Low => 'success',
            self::Medium => 'warning',
            self::High => 'danger',
            self::VeryHigh => 'danger',
        };
    }
}
