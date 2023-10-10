<?php

namespace Hiren\Igitt\Validators;

use Illuminate\Validation\Rule;

class RolePostValidator extends AbstractValidator
{
    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'unique:roles',
                'max:128',
            ],
            'ord' => [
                'bail',
                'integer',
                'gt:0',
            ],
            'status' => [
                Rule::in([0, 1]),
            ],
        ];
    }
}