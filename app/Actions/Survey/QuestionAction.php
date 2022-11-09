<?php


namespace App\Actions\Survey;


use App\Actions\SurveyAction;
use App\Models\Answer;
use Illuminate\Http\Request;

class QuestionAction extends SurveyAction
{
    /**
     * @param array|null $attr
     * @return Request
     */
    public function handle(array $attr = null): Request
    {
        return $this->fillRequest(array_merge(
            $this->model->getAttributes(),
            ['answer' => $this->addAnswer()]
        ));
    }

    /**
     * @return int
     */
    private function addAnswer(): int
    {
        return Answer::query()->insertGetId(values: [
            'question_id' => $this->model->id,
            'next_question_id' => $this->model->next_question_id
        ]);
    }
}
