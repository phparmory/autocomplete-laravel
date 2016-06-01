<?php

namespace Armory\Autocomplete\Laravel;

use Illuminate\Support\Facades\Facade;

class Autocomplete extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'autocomplete';
    }
}
