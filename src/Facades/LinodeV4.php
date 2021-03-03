<?php

namespace LittleGreenMan\LinodeV4\Facades;

use Illuminate\Support\Facades\Facade;

class LinodeV4 extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'linodev4';
    }
}
