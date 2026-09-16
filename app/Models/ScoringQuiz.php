<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class ScoringQuiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function scoringSections(): HasMany
    {
        return $this->hasMany(ScoringSection::class);
    }

    public function scorings(): HasMany
    {
        return $this->hasMany(Scoring::class);
    }

    public function scoringQuestions(): HasManyThrough
    {
        return $this->hasManyThrough(ScoringQuestion::class, ScoringSection::class);
    }

    public function maxPoints(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->scoringQuestions()->sum('points')
        );
    }
}
