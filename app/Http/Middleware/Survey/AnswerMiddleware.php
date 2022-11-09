<?php

namespace App\Http\Middleware\Survey;

use App\Actions\Survey\AnswerAction;
use App\Models\Answer;
use Closure;
use Illuminate\Http\Request;

class AnswerMiddleware
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
        $action = new AnswerAction(
            Answer::query()->findOrFail($request->get('id')),
            $request
        );
        $request = $action->handle(['text' => $request->get('text')]);
        return $next($request);
    }
}
