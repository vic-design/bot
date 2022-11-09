<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function input(Request $request): string
    {
        return (new QuestionResource($request))->toJson();
    }
}
