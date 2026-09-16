<?php

namespace App\Models;

use App\Enums\QuestionImpact;
use App\Enums\QuestionPriority;
use App\Enums\QuestionProbability;
use App\Enums\QuestionSeverity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ScoringQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'points',
        'type',
        'severity',
        'probability',
        'impact',
        'priority',
        'sort',
    ];

    protected $casts = [
        'severity' => QuestionSeverity::class,
        'probability' => QuestionProbability::class,
        'impact' => QuestionImpact::class,
        'priority' => QuestionPriority::class,
    ];

    public const QUESTION_INPUT = 'QUESTION_INPUT';

    public const QUESTION_TOGGLE = 'QUESTION_TOGGLE';

    public function scoringSection(): BelongsTo
    {
        return $this->belongsTo(ScoringSection::class);
    }

    public function scoringAnswers(): HasMany
    {
        return $this->hasMany(ScoringAnswer::class);
    }

    public function getAnswer(Scoring $scoring): ?ScoringAnswer
    {
        return $this->scoringAnswers()->where('scoring_id', $scoring->id)->first();
    }
}
