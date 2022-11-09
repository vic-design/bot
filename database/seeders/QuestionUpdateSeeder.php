<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = Question::all();
        $questions->each(function (Question $model) {
            $next = Question::query()->firstWhere('order', '>', $model->order);
            $model->update(attributes: [
                'next_question_id' => $next?->id
            ]);
        });
    }
}
