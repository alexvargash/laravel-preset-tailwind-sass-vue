# Laravel 5.7+ preset tailwind, sass & vue

A scaffolding preset for adding the necesary npm dependecies and file structure for using [Tailwind CSS](https://tailwindcss.com), [Sass](https://sass-lang.com/) and [Vue.js](https://vuejs.org/) with a Laravel 5.7 project.

*This package only works with Laravel 5.7 due to the changes on the resources directory.*

## Preset

1. This package adds the following npm dependencies:

| Package              | Current version |
| -------------------- |:---------------:|
| vue-router           | 3.0.1           |
| tailwindcss          | 0.6.6           |
| laravel-mix          | 2.1.14          |
| laravel-mix-purgecss | 3.0.0           |
| laravel-mix-tailwind | 0.1.0           |

2. Removes the unnecessary lines on *app.js* and *botstrap.js*.
3. Change the *webpack.mix.js* to work with Tailwind CSS and Purge Css.
4. Add the Tailwind CSS default structure to *app.sass*.
5. Creates an example Vue instance and added it to *welcome.blade.php*.

## Usage

1. Fresh install of Laravel >= 5.7.
2. Install the preset with `composer require alexvargash/laravel-preset-tailwind-sass-vue`. Laravel will automatically discover this package. No need to register the service provider.
3. Run the preset with `php artisan preset tailwind-sass-vue`.
4. Run the npm installation packages `npm install`.
5. Initialize Tailwind CSS with `node_modules/.bin/tailwind init tailwind.js`.
6. Compile the assets with `npm run dev`.
7. This package can be removed after running it `composer remove alexvargash/laravel-preset-tailwind-sass-vue`.
