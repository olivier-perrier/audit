<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScoringSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'scoring_quiz_id',
        'sort',
        'icon',
        'description',
    ];

    public function scoringQuestions(): HasMany
    {
        return $this->hasMany(ScoringQuestion::class);
    }

    public function scoringQuiz(): BelongsTo
    {
        return $this->belongsTo(ScoringQuiz::class);
    }

    public function getAnswers(Scoring $scoring): Collection
    {
        $questionIds = $this->scoringQuestions->pluck('id');

        return ScoringAnswer::query()
            ->whereIn('scoring_question_id', $questionIds)
            ->where('scoring_id', $scoring->id)
            ->get();
    }

    public function getScoreAttribute(Scoring $scoring): int
    {
        $answers = $scoring->scoringAnswers()
            ->whereHas('scoringQuestion', function ($query) {
                $query->where('scoring_section_id', $this->id);
            })
            ->positives()
            ->with('scoringQuestion')
            ->get();

        $points = 0;

        foreach($answers as $answer) {
            $points += $answer->scoringQuestion->points;
        }

        return $points;
    }

    public function getScorePourcentage(Scoring $scoring): float
    {
        return round($this->getScoreAttribute($scoring) * 100 / $this->pointsCount, 2);
    }

    public function pointsCount(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->scoringQuestions()->sum('points'),
        );
    }
}
