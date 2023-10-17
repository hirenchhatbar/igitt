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
 * UserPutValidator class
 *
 * @author Hiren Chhatbar <hc.rajkot@gmail.com>
 */
class UserPutValidator extends AbstractValidator
{
    /**
     * Constructor
     *
     * @param UserPostValidator $userPostValidator
     */
    public function __construct(protected UserPostValidator $userPostValidator)
    {

    }

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        $rules = $this->userPostValidator->rules();

        $rules['name'] = [
            'required',
            Rule::unique('users')->ignore($this->getId()),
            'max:128',
        ];

        return $rules;
    }
}