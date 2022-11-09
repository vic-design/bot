<?php
namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface SurveyActionInterface
{
    /**
     * SurveyActionInterface constructor.
     * @param Model $model
     * @param Request $request
     */
    public function __construct(
        Model $model,
        Request $request
    );

    /**
     * @param array|null $attr
     * @return Request
     */
    public function handle(?array $attr): Request;
}
