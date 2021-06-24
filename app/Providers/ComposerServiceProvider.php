<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['components.forms.select-country'], 'App\Http\ViewComposers\CountriesComposer');
        View::composer(['components.forms.select-topic'], 'App\Http\ViewComposers\TopicsComposer');
    }
}
