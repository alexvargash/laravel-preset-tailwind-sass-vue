<?php

namespace Alexvargash;

use Alexvargash\Preset;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class TailwindSassVueServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('tailwind-sass-vue', function ($command) {
            Preset::install();

            $command->info('Tailwindcss Sass Vue scaffolding installed successfully.');
            $command->comment('First run "npm install" to add your npm dependecies.');
            $command->comment('Then run "node_modules/.bin/tailwind init tailwind.js" to initialize tailwindcss.');
            $command->comment('Finally run "npm run dev" to compile your fresh scaffolding.');
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }
}
