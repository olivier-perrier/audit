<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Scoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'scoring_quiz_id',
        'author_id',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scoringQuiz(): BelongsTo
    {
        return $this->belongsTo(ScoringQuiz::class);
    }

    public function scoringAnswers(): HasMany
    {
        return $this->hasMany(ScoringAnswer::class);
    }

    public function getScoreAttribute(): int
    {
        $answers = $this->scoringAnswers()
            ->positives()
            ->with('scoringQuestion')
            ->get();


        $points = 0;

        foreach ($answers as $answer) {
            $points += $answer->scoringQuestion->points;
        }

        return $points;
    }

    public function scorePourcentage(): Attribute
    {
        return Attribute::make(
            get: fn() => round($this->score * 100 / $this->scoringQuiz->maxPoints),
        );
    }

    public function isCompleted(): bool
    {
        return $this->scoringAnswers()->count() === $this->scoringQuiz->scoringQuestions()->count();
    }
}
