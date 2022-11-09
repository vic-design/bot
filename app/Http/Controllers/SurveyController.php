<?php

namespace App\Http\Controllers;

use App\Models\Survey;

class SurveyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Survey $survey
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Survey $survey): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $question = $survey->questions()->orderBy('order')->first();

        return view('survey', ['question' => $question]);
    }
}
