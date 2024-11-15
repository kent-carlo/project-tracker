<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'cool';
});

Route::get('/clear-cache', function () {
    Artisan::call('vendor:publish --force --tag=livewire:assets');
});
