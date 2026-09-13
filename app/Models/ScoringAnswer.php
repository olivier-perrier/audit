<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScoringAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'scoring_id',
        'scoring_question_id',
        'answer',
    ];

    protected $casts = [
        // 'answer' => 'boolean',
    ];

    public function scoringQuestion(): BelongsTo
    {
        return $this->belongsTo(ScoringQuestion::class);
    }

    public function points(): Attribute
    {
        return Attribute::make(
            get: fn()  => $this->scoringQuestion->points
        );
    }

    #[Scope]
    protected  function negatives(Builder $query): void
    {
        $query->where('answer', false);
    }

    #[Scope]
    protected  function positives(Builder $query): void
    {
        $query->where('answer', true);
    }
}
