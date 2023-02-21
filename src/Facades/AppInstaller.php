<?php

namespace DanTheCoder\AppInstaller\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DanTheCoder\AppInstaller\AppInstaller
 */
class AppInstaller extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \DanTheCoder\AppInstaller\AppInstaller::class;
    }
}
