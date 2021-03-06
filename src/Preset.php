<?php

namespace Alexvargash\LaravelPreset;

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
                'vue' => '^2.5.22',
                'vue-router' => '^3.0.2',
                'tailwindcss' => '^0.7.3',
                'laravel-mix' => '^4.0.14',
                'laravel-mix-purgecss' => '^4.0.0',
                'laravel-mix-tailwind' => '^0.1.0',
            ],
            Arr::except($packages, [
                'vue',
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
        copy(__DIR__.'/stubs/js/webpack.mix.js', base_path('webpack.mix.js'));
    }

    /**
     * Update the bootstrap and app scripts to use the vue configuration.
     *
     * @return void
     */
    public static function updateScripts()
    {
        copy(__DIR__.'/stubs/js/app.js', resource_path('js/app.js'));
        copy(__DIR__.'/stubs/js/VueApp.js', resource_path('js/VueApp.js'));
        copy(__DIR__.'/stubs/js/bootstrap.js', resource_path('js/bootstrap.js'));
    }

    /**
     * Update the sass directory to have the configuration necessary to use
     * tailwindcss.
     *
     * @return void
     */
    public static function updateSassDirectory()
    {
        File::cleanDirectory(resource_path('sass'));
        copy(__DIR__.'/stubs/sass/app.sass', resource_path('sass/app.sass'));
        File::makeDirectory(resource_path('sass'). DIRECTORY_SEPARATOR . 'utilities');
        File::makeDirectory(resource_path('sass'). DIRECTORY_SEPARATOR . 'components');
    }

    /**
     * Update the views directory to have a base layout and a welcome file.
     *
     * @return void
     */
    public static function updateViewsDirectory()
    {
        File::makeDirectory(resource_path('views'). DIRECTORY_SEPARATOR . 'layouts');
        copy(__DIR__.'/stubs/php/app.blade.php', resource_path('views/layouts/app.blade.php'));
        copy(__DIR__.'/stubs/php/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }
}
