<?php

namespace App\Http\Controllers;

use App\Models\Scoring;
use App\Models\ScoringAnswer;
use App\Models\ScoringQuestion;
use App\Models\ScoringSection;
use Illuminate\Http\Request;

class ScoringQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Scoring $scoring, ScoringSection $scoringSection, $scoring_question)
    {
        $scoringQuestion = ScoringQuestion::findOrFail($scoring_question);

        $answer = $scoring->scoringAnswers()->where('scoring_question_id', $scoringQuestion->id)->first();

        $preview_question = $scoringSection->scoringQuestions()->where('sort', $scoringQuestion->sort - 1)->first();

        $scoring = $scoring->load([
            'scoringQuiz.scoringSections',
            'scoringQuiz.scoringSections.scoringQuestions' => function ($query) use ($scoring) {
                $query->with(['scoringAnswers' => function ($query) use ($scoring) {
                    $query->where('scoring_id', $scoring->id);
                }]);
            }
        ]);

        $section = $scoringSection->load([
            'scoringQuestions' => function ($query) use ($scoring) {
                $query->with(['scoringAnswers' => function ($query) use ($scoring) {
                    $query->where('scoring_id', $scoring->id);
                }]);
            }
        ]);

        return view('scoring-question.show', [
            'scoring' => $scoring,
            'section' => $section,
            'question' => $scoringQuestion,
            'answer' => $answer,
            'preview_question' => $preview_question,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScoringQuestion $scoringQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scoring $scoring, ScoringSection $scoringSection, $scoringQuestion)
    {
        $scoringQuestion = ScoringQuestion::findOrFail($scoringQuestion);

        $validated = $request->validate([
            'answer' => 'nullable|boolean',
        ]);

        ScoringAnswer::query()
            ->updateOrCreate([
                'scoring_id' => $scoring->id,
                'scoring_question_id' => $scoringQuestion->id,
            ], [
                'answer' => $validated['answer'],
                'points' => $scoringQuestion->points,
            ]);

        $next_question = $scoringSection->scoringQuestions()->where('sort', $scoringQuestion->sort + 1)->first();

        if ($next_question) {
            return redirect()->route('scorings.scoring-sections.scoring-questions.show', [$scoring, $scoringSection, $next_question]);
        } else {
            return redirect()->route('scorings.scoring-sections.index', $scoring);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScoringQuestion $scoringQuestion)
    {
        //
    }
}
