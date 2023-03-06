<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use DanTheCoder\AppInstaller\Http\Controllers\CreateUserController;
use DanTheCoder\AppInstaller\Http\Controllers\RequirementController;
use DanTheCoder\AppInstaller\Http\Controllers\ConfigurationController;


App::booted(function () {
    // Force all other routes to redirect to the install
    // If the installation was not completed
    if (!config('app-installer.completed')) {
        app('router')->get('/', function () {
            return redirect()->route('app-installer::requirements.index');
        })->middleware('web');

        app('router')->get('{any}', function () {
            return redirect()->route('app-installer::requirements.index');
        })->middleware('web')->where('any', '^.*$');
    }
});

Route::middleware(['web', 'install_completed'])->prefix('install')->name('app-installer::')->group(function () {
    Route::get('/', [RequirementController::class, 'index'])->name('requirements.index');
    Route::post('/', [RequirementController::class, 'store'])->name('requirements.store');

    Route::get('/configuration', [ConfigurationController::class, 'index'])->name('configuration.index');
    Route::post('/configuration', [ConfigurationController::class, 'store'])->name('configuration.store');

    Route::get('/create-user', [CreateUserController::class, 'index'])->name('create-user.index');
    Route::post('/create-user', [CreateUserController::class, 'store'])->name('create-user.store');
});
