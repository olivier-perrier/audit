<?php

use App\Models\ScoringQuiz;
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
        Schema::create('scoring_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('sort');
            $table->string('icon')->nullable();
            $table->text('description')->nullable();

            $table->foreignIdFor(ScoringQuiz::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scoring_sections');
    }
};
