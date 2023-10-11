<?php
/**
 * This file is part of the Igitt package.
 *
 * (c) Hiren Chhatbar <hc.rajkot@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hiren\Igitt\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

/**
 * AbstractCrudController class
 *
 * @author Hiren Chhatbar <hc.rajkot@gmail.com>
 */
abstract class AbstractCrudController extends Controller implements CrudControllerInterface
{
    use ValidatesRequests;

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