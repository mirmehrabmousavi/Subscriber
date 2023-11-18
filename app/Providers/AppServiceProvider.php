<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('user.layouts.app', function ($view) {
            $name = Settings::where('key' , 'name')->pluck('value')->first();
            $title = Settings::where('key' , 'title')->pluck('value')->first();
            $logo = Settings::where('key' , 'logo')->pluck('value')->first();

            $view->with([
                'name' => $name,
                'title' => $title,
                'logo' => $logo,
            ]);
        });

        view()->composer('admin.layouts.app', function ($view) {
            $name = Settings::where('key' , 'name')->pluck('value')->first();
            $title = Settings::where('key' , 'title')->pluck('value')->first();
            $logo = Settings::where('key' , 'logo')->pluck('value')->first();

            $view->with([
                'name' => $name,
                'title' => $title,
                'logo' => $logo,
            ]);
        });
    }
}
