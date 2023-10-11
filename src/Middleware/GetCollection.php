<?php
/**
 * This file is part of the Igitt package.
 *
 * (c) Hiren Chhatbar <hc.rajkot@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hiren\Igitt\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * GetCollection class
 *
 * @author Hiren Chhatbar <hc.rajkot@gmail.com>
 */
class GetCollection
{
    /**
     * The function handles a request by merging sort and page parameters into the request object and
     * then continues processing the request.
     *
     * @param Request request The `` parameter is an instance of the `Illuminate\Http\Request`
     * class. It represents an incoming HTTP request and contains information such as the request
     * method, headers, query parameters, and request body.
     * @param Closure next The `` parameter is a closure that represents the next middleware or
     * the final request handler in the middleware stack. It is responsible for processing the request
     * and returning a response. By calling `()`, you are passing the request to the next
     * middleware or request handler in the stack.
     *
     * @return the result of calling the `` closure with the `` parameter.
     */
    public function handle(Request $request, Closure $next)
    {
        if ($sort = $request->query('sort')) {
            $request->merge(['sort_params' => $this->sortParams($sort)]);
        }

        $request->merge(['page_params' => $this->pageParams($request->query('page', []))]);

        // Continue processing the request
        return $next($request);
    }

    /**
     * The function takes a comma-separated string of sort parameters and returns an array where each
     * parameter is split into a field and direction.
     *
     * @param string sort The "sort" parameter is a string that contains comma-separated values
     * representing the sorting criteria. Each value can be in the format of "field" or "-field", where
     * "field" is the name of the field to sort by and the "-" sign indicates descending order.
     *
     * @return array an array of sort parameters.
     */
    protected function sortParams(string $sort): array
    {
        $sortParams = [];

        $arr = \explode(',', $sort);

        foreach (\array_filter($arr, 'trim') as $val) {
            $sortField = false !== strpos($val, '-') ? substr($val, 1) : $val;

            $sortDirection = false !== strpos($val, '-') ? 'DESC' : 'ASC';

            $sortParams[$sortField] = $sortDirection;
        }

        return $sortParams;
    }

    /**
     * The function "pageParams" takes an array of page parameters and returns an array of calculated
     * page parameters.
     *
     * @param array page The `page` parameter is an array that contains information about pagination.
     * It typically includes the `limit` and `offset` values.
     *
     * @return array an array of page parameters.
     */
    protected function pageParams(array $page): array
    {
        $pageParams = [];

        $pageParams['per_page'] = $page['limit'] ?? 30;

        $pageParams['page'] = floor(($page['offset'] ?? 0) / $pageParams['per_page']) + 1;

        return $pageParams;
    }
}