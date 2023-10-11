<?php
/**
 * This file is part of the Igitt package.
 *
 * (c) Hiren Chhatbar <hc.rajkot@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hiren\Igitt\Validators;

use Illuminate\Validation\Rule;

/**
 * RolePutValidator class
 *
 * @author Hiren Chhatbar <hc.rajkot@gmail.com>
 */
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