<?php

namespace {{{{organizationName}}}}\{{{{packageName}}}}\Facades;

use Illuminate\Support\Facades\Facade;
use {{{{organizationName}}}}\{{{{packageName}}}}\{{{{packageName}}}} as Implementation;

/**
 * @see \{{{{organizationName}}}}\{{{{packageName}}}}\{{{{packageName}}}}
 */
class {{{{packageName}}}} extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Implementation::class;
    }
}
