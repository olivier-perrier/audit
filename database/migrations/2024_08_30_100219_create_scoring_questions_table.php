<?php

use App\Models\ScoringSection;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scoring_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ScoringSection::class)->constrained();
            $table->string('type');
            $table->text('question');
            $table->integer('points')->nullable();
            $table->string('severity')->nullable();
            $table->string('probability')->nullable();
            $table->string('impact')->nullable();
            $table->string('priority')->nullable();
            $table->string('operator')->nullable();
            $table->integer('reference')->nullable();
            $table->integer('sort');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scoring_questions');
    }
};
