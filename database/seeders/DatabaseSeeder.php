<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Démo Admin',
            'email' => 'demo.admin@audit.fr',
            'is_admin' => true,
        ]);

        $this->call([
            ScoringQuizSeeder::class,
            ScoringSeeder::class,
        ], parameters: ['user' => $user]);

        // Scoring::factory()->create([
        //     "scoring_quiz_id" => $scoringQuiz->id,
        //     "author_id" => $user->id,
        // ]);
    }
}
