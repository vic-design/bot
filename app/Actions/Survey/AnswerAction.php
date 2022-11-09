<?php


namespace App\Actions\Survey;


use App\Actions\SurveyAction;
use Illuminate\Http\Request;

class AnswerAction extends SurveyAction
{
    /**
     * @param array|null $attr
     * @return Request
     */
    public function handle(?array $attr): Request
    {
        $this->model->update($attr);
        return $this->fillRequest($this->model->getAttributes());
    }
}
