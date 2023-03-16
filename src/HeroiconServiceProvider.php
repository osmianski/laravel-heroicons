<?php

namespace Osmianski\Heroicons;

use Illuminate\Support\ServiceProvider;

class HeroiconServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'heroicons');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/heroicons'),
        ]);
    }
}
