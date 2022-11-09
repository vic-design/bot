<?php

namespace App\Http\Middleware\Survey;

use App\Actions\Survey\QuestionAction;
use App\Models\Question;
use Closure;
use Illuminate\Http\Request;

class QuestionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $action = new QuestionAction(
            Question::query()->findOrFail($request->get('next_question_id')),
            $request
        );
        $request = $action->handle();
        return $next($request);
    }
}
