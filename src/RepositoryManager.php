<?php

namespace Armory\Autocomplete\Laravel;

use Armory\Autocomplete\Repositories\ArrayRepository;
use Armory\Autocomplete\Repositories\RedisRepository;
use Illuminate\Support\Manager;

class RepositoryManager extends Manager
{
    /**
     * Create a new array driver
     * @return RepositoryInterface
     */
    public function createArrayDriver()
    {
        return new ArrayRepository();
    }

    /**
     * Create a new redis driver
     * @return RepositoryInterface
     */
    public function createRedisDriver()
    {
        return new RedisRepository($this->app['redis']);
    }

    /**
     * Get the default driver for autocomplete
     * @return string
     */
    public function getDefaultDriver()
    {
        return $app['config']['autocomplete.driver.default'];
    }
}
