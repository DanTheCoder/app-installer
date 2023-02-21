<?php

namespace DanTheCoder\AppInstaller;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AppInstallerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('app-installer')
            ->hasConfigFile()
            ->hasViews()
            ->hasRoute('../routes/web');

        $this->app['router']->aliasMiddleware('install_completed', \DanTheCoder\AppInstaller\Http\Middleware\InstallCompleted::class);
    }
}
