<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class SurveyAction implements SurveyActionInterface
{
    /**
     * SurveyAction constructor.
     * @param Model $model
     * @param Request $request
     */
    public function __construct(
        protected Model $model,
        protected Request $request
    )
    {
    }

    /**
     * @param array|null $attr
     * @return Request
     */
    abstract public function handle(?array $attr): Request;

    /**
     * @param mixed ...$attr
     * @return Request
     */
    protected function fillRequest(...$attr): Request
    {
        return $this->request->merge(...$attr);
    }
}
