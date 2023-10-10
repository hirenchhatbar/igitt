<?php

namespace Hiren\Igitt\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

abstract class AbstractCrudController extends Controller implements CrudControllerInterface
{
    /**
     * @inheritDoc
     */
    public function validate(Request $request, array $rules, array $messages = [], array $attributes = [])
    {
        $validator = $this->getValidationFactory()->make(
            $request->all(), $rules, $messages, $attributes
        );

        if ($validator->fails()) {
            $errors = $validator->errors();

            throw new HttpResponseException(response()->json(['errors' => $errors], 422));
        }
    }
}