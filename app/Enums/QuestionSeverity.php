<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum QuestionSeverity: string implements HasLabel, HasColor
{
    case Low = 'low';
    case Medium = 'medium';
    case High = 'high';
    case Critical = 'critical';

    public function getLabel(): string
    {
        return match ($this) {
            self::Low => 'Faible',
            self::Medium => 'Moyenne',
            self::High => 'Élevée',
            self::Critical => 'Critique',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Low => 'success',
            self::Medium => 'warning',
            self::High => 'danger',
            self::Critical => 'danger',
        };
    }

    public function getColorClass(): string
    {
        return match ($this) {
            self::Low => 'text-green-500',
            self::Medium => 'text-yellow-500',
            self::High => 'text-red-500',
            self::Critical => 'text-red-700',
        };
    }

    public function getBackgroundColorClass(): string
    {
        return match ($this) {
            self::Low => 'bg-green-500',
            self::Medium => 'bg-yellow-500',
            self::High => 'bg-red-500',
            self::Critical => 'bg-red-700',
        };
    }
}
