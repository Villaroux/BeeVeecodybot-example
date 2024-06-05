<?php

use Illuminate\Support\Facades\Route;

Route::name('codyfight.')->domain('https://game.codyfight.com')->group(function () {
    Route::post('/')
        ->name('begin_queueing');

    Route::get('/')
        ->name('check_state');

    Route::put('/')
        ->name('move');

    Route::patch('/')
        ->name('use_skill');

    Route::delete('/')
        ->name('surrender');
});
