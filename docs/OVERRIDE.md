# Override

## Model

1. Create class in app directory extending the model class of package e.g Role.php
```
# app/Models/Role.php

<?php

namespace App\Models;

use Hiren\Igitt\Models\Role as BaseRole;

class Role extends BaseRole
{
    /**
     * @inheritDoc
     */
    public function getCollection(array $page, array $filter = [], array $sort = [])
    {
        return parent::getCollection($page, $filter, $sort);
    }
}
```
2. Bind new class in AppServiceProvider service provider
```
# app/Providers/AppServiceProvider.php

<?php

namespace App\Providers;

use App\Models\Role as AppRole;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        /**
         *********** Models ***********
         */
        Role::class => AppRole::class,
        /**
         *********** End models ***********
         */
    ];
}
```

## Validator

1. Create class in app directory extending the validator class of package e.g RolePostValidator
```
# app/Validators/RolePostValidator.php

<?php

namespace App\Validators;

use Hiren\Igitt\Validators\RolePostValidator as BaseRolePostValidator;

class RolePostValidator extends BaseRolePostVailidator
{
    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        $rules = parent::rules();

        // Override anything

        return $rules;
    }
}
```
2. Bind new class in AppServiceProvider service provider
```
# app/Providers/AppServiceProvider.php

<?php

namespace App\Providers;

use App\Validators\RolePostValidator as AppRolePostValidator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        /**
         *********** Validators ***********
         */
        RolePostValidator::class => AppRolePostValidator::class,
        /**
         *********** End validators ***********
         */
    ];
}
```

## Controller

1. Create class in app directory extending the validator class of package e.g RoleController
```
# app/Http/Controllers/RoleController.php

<?php

namespace App\Http\Controllers;

use Hiren\Igitt\Controllers\RoleController as BaseRoleController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends BaseRoleController
{
    /**
     * @inheritDoc
     */
    public function post(Request $request): JsonResponse
    {
        return parent::post($request);
    }
}
```
2. Bind new class in AppServiceProvider service provider
```
# app/Providers/AppServiceProvider.php

<?php

namespace App\Providers;

use App\Validators\RolePostValidator as AppRolePostValidator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        /**
         *********** Controllers ***********
         */
        RoleController::class => AppRoleController::class,
        /**
         *********** End controllers ***********
         */
    ];
}
```