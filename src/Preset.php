<?php

namespace Alexvargash;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;

class Preset extends LaravelPreset
{
    /**
     * Intall process for the tailwind-sass-vue preset.
     *
     * @return void
     */
    public static function install()
    {
        static::updatePackages();
        static::updateWebpackMix();
        static::updateScripts();
        static::updateSassDirectory();
        static::updateViewsDirectory();
    }

    /**
     * Update the package.json with the tailwind and vue dependencies.
     *
     * @param  array $packages
     * @return void
     */
    public static function updatePackageArray($packages)
    {
        return array_merge(
            [
                'vue-router' => '^3.0.1',
                'tailwindcss' => '^0.6.6',
                'laravel-mix' => '^2.1.14',
                'laravel-mix-purgecss' => '^3.0.0',
                'laravel-mix-tailwind' => '^0.1.0',
            ],
            Arr::except($packages, [
                'jquery',
                'lodash',
                'bootstrap',
                'popper.js',
                'laravel-mix',
            ])
        );
    }

    /**
     * Update the webpack configuration to use tailwind and purgeCss.
     *
     * @return void
     */
    public static function updateWebpackMix()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    /**
     * Update the bootstrap and app scripts to use the vue configuration.
     *
     * @return void
     */
    public static function updateScripts()
    {
        copy(__DIR__.'/stubs/app.js', resource_path('js/app.js'));
        copy(__DIR__.'/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
        copy(__DIR__.'/stubs/VueApp.js', resource_path('js/VueApp.js'));
    }

    /**
     * Update the sass directory to have the configuration necessary to use tailwindcss.
     *
     * @return void
     */
    public static function updateSassDirectory()
    {
        File::cleanDirectory(resource_path('sass'));
        copy(__DIR__.'/stubs/app.sass', resource_path('sass/app.sass'));
        File::makeDirectory(resource_path('sass'). DIRECTORY_SEPARATOR . 'components');
        File::makeDirectory(resource_path('sass'). DIRECTORY_SEPARATOR . 'utilities');
    }

    /**
     * Update the views directory to have a base layout and a welcome file.
     *
     * @return void
     */
    public static function updateViewsDirectory()
    {
        File::makeDirectory(resource_path('views'). DIRECTORY_SEPARATOR . 'layouts');
        copy(__DIR__.'/stubs/app.blade.php', resource_path('views/layouts/app.blade.php'));
        copy(__DIR__.'/stubs/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }
}
