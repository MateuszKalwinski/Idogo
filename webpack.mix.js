
const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.scripts(['resources/js/app.js'], 'public/js/app.js')
    .scripts([
        'resources/js/modules/frontendIndex.js',
        'resources/js/modules/frontendAnimal.js',
        'resources/js/modules/frontendAnimals.js',
        'resources/js/modules/frontendShelter.js',
        'resources/js/modules/frontendShelters.js',
        'resources/js/modules/frontendUser.js',
        'resources/js/modules/backendProfile.js',
        'resources/js/modules/backendAnimalColors.js',
        'resources/js/modules/backendAnimalFurs.js',
        'resources/js/modules/backendAnimalSizes.js',
        'resources/js/modules/backendAnimalCharacteristics.js',
        'resources/js/modules/backendAnimalSpecies.js',
        'resources/js/modules/backendAnimalBreeds.js',
        'resources/js/modules/backendAvailableColors.js',
        'resources/js/modules/backendAvailableFurs.js',
        'resources/js/modules/backendAvailableCharacteristicDictionary.js',
        'resources/js/modules/backendAddAnimal.js',
        'resources/js/modules/errors.js',
        'resources/js/modules/success.js'
    ], 'public/js/main.js')

    .babel(['resources/js/admin.js'], 'public/js/admin.js')
    .babel(['resources/js/menu.js'], 'public/js/menu.js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false
    });
