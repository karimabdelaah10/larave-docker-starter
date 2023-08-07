<?php

use App\Modules\BaseApp\Enums\BaseAppEnums;
use App\Modules\Country\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => BaseAppEnums::COUNTRY_MODULE_PREFIX,
        'as' => BaseAppEnums::COUNTRY_MODULE_PREFIX . '.',
        'middleware' => ['web', 'auth']
    ],
    function () {
        Route::get('/', [CountryController::class, 'index'])->name('index');
        Route::get('/show/{id}', [CountryController::class, 'show'])->name('show');
        Route::get('/create', [CountryController::class, 'getCreate'])->name('getCreate');
        Route::post('/store', [CountryController::class, 'postCreate'])->name('postCreate');
        Route::get('/edit/{id}', [CountryController::class, 'getEdit'])->name('getEdit');
        Route::post('/update/{id}', [CountryController::class, 'postUpdate'])->name('postUpdate');
        Route::delete('/delete/{id}', [CountryController::class, 'delete'])->name('delete');

    });
