<?php

namespace Hiren\ApiPlatform\Middleware;

use Closure;
use Illuminate\Http\Request;

class GetCollection
{
    public function handle(Request $request, Closure $next)
    {
        if ($sort = $request->query('sort')) {
            $request->merge(['sort_params' => $this->sortParams($sort)]);
        }

        $request->merge(['page_params' => $this->pageParams($request->query('page', []))]);

        // Continue processing the request
        return $next($request);
    }

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

    protected function pageParams(array $page): array
    {
        $pageParams = [];

        $pageParams['per_page'] = $page['limit'] ?? 30;

        $pageParams['page'] = floor(($page['offset'] ?? 0) / $pageParams['per_page']) + 1;

        return $pageParams;
    }
}
