<?php

namespace Armory\Autocomplete\Laravel\Traits;

use Autocomplete;
use Illuminate\Support\Collection;

trait Autocompleted
{
    /**
     * Attributes that can be autocomplete
     * @var array
     */
    protected $autocompleted;

    /**
     * Index the attributes that can be autocompleted
     * @return void
     */
    public function autocompleteIndex()
    {
        foreach ($this->autocompleted as $attribute) {
            Autocomplete::index(
                $this->getKey(),
                $this->$attribute,
                get_class($this)
            );
        }
    }

    /**
     * Return an array of ids that match the autocomplete
     * @param string $search
     * @return array
     */
    public static function autocompleteIds(string $search)
    {
        return Autocomplete::find($search, get_class($this));
    }

    /**
     * Return a full collection of models based on an autocomplete
     * @param  string $search
     * @return Collection
     */
    public static function autocomplete(string $search)
    {
        return static::whereIn('id', static::autocompleteIds($search))->get();
    }
}
