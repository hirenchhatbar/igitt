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
 * RolePostValidator class
 *
 * @author Hiren Chhatbar <hc.rajkot@gmail.com>
 */
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