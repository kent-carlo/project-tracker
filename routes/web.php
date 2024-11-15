<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/clear-cache', function () {
    // Clear route cache
    Artisan::call('route:clear');
    $routeOutput = Artisan::output();

    // Clear view cache
    Artisan::call('view:clear');
    $viewOutput = Artisan::output();

    // Clear config cache
    Artisan::call('config:clear');
    $configOutput = Artisan::output();

    // Clear config cache
    Artisan::call('vendor:publish --force --tag=livewire:assets');
    $configOutputvendor = Artisan::output();

    return response()->json([
        'message' => 'Caches cleared successfully',
        'outputs' => [
            'route' => $routeOutput,
            'view' => $viewOutput,
            'config' => $configOutput,
            'configOutputvendor' => $configOutputvendor,
        ]
    ]);
});
