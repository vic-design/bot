<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Answer::query()->first()) {
            $question = Question::query()->orderBy('order')->first();
            Answer::query()->create(attributes: [
                'question_id' => $question->id,
                'next_question_id' => $question->next_question_id
            ]);
        }

    }
}
