<?php

use DanTheCoder\AppInstaller\Http\Controllers\ConfigurationController;
use DanTheCoder\AppInstaller\Http\Controllers\CreateUserController;
use DanTheCoder\AppInstaller\Http\Controllers\RequirementController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'install_completed'])->prefix('install')->name('app-installer::')->group(function () {
    Route::get('/', [RequirementController::class, 'index'])->name('requirements.index');
    Route::post('/', [RequirementController::class, 'store'])->name('requirements.store');

    Route::get('/configuration', [ConfigurationController::class, 'index'])->name('configuration.index');
    Route::post('/configuration', [ConfigurationController::class, 'store'])->name('configuration.store');

    Route::get('/create-user', [CreateUserController::class, 'index'])->name('create-user.index');
    Route::post('/create-user', [CreateUserController::class, 'store'])->name('create-user.store');
});
