<?php

namespace App\Http\Controllers;

use App\Models\Scoring;
use App\Models\ScoringQuiz;
use Illuminate\Http\Request;

class ScoringController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->authorizeResource(Scoring::class, 'scoring');
    }

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
    public function create(Request $request)
    {
        $scoring = $request->user()->scorings()->first();

        $scoring = Scoring::create([
            'scoring_quiz_id' => ScoringQuiz::first()->id,
            'author_id' => $request->user()->id,
        ]);

        return redirect()->route('scorings.scoring-sections.index', $scoring);
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
    public function show(Scoring $scoring)
    {
        $scoring = $scoring->load('scoringQuiz', 'scoringQuiz.scoringSections', 'scoringQuiz.scoringSections.scoringQuestions');

        return view('scoring.show', [
            'scoring' => $scoring,
        ]);
    }

    /**
     * Display the Scoring certification.
     */
    public function certification(Scoring $scoring)
    {
        return view('scoring.certification', [
            'scoring' => $scoring->load('scoringQuiz', 'scoringQuiz.scoringSections'),
        ]);
    }

    /**
     * Display the Scoring iframe.
     */
    public function iframe(Scoring $scoring)
    {
        return view('scoring.iframe', [
            'scoring' => $scoring->load('scoringQuiz', 'scoringQuiz.scoringSections'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scoring $scoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scoring $scoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scoring $scoring)
    {
        $scoring->delete();

        return redirect()->route('dashboard');
    }
}
