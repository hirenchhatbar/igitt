<?php

namespace Hiren\Igitt\Validators;

use Illuminate\Validation\Rule;

class RolePutValidator extends AbstractValidator
{
    /**
     * Constructor
     *
     * @param RolePostValidator $rolePostValidator
     */
    public function __construct(protected RolePostValidator $rolePostValidator)
    {

    }

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        $rules = $this->rolePostValidator->rules();

        $rules['name'] = [
            'required',
            Rule::unique('roles')->ignore($this->getId()),
            'max:128',
        ];

        return $rules;
    }
}