<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.vercel.enabled')) {
            $paths = [
                '/tmp/framework/sessions',
                '/tmp/framework/cache',
                '/tmp/storage/bootstrap/cache',
                '/tmp/storage/framework/cache',
                config('view.compiled'),
            ];

            foreach ($paths as $path) {
                if (! is_dir($path)) {
                    mkdir($path, 0755, true);
                }
            }         
        }
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        };
        $source = database_path('database.sqlite');
        $destination = '/tmp/database.sqlite';

        if (!file_exists($destination)) {
            File::copy($source, $destination);
        }
    }
}
