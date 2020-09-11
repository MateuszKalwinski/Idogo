<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        View::composer('backend.*', '\App\Hipuppy\ViewComposers\BackendComposer');


        View::composer('*', function ($view) {
            $view->with('placeholder', asset('images/placeholder.jpg'));
        });

        View::composer('*', function ($view) {
            $view->with('placeholderUser', asset('images/placeholder-user.jpg'));
        });

        View::composer('*', function ($view) {
            $view->with('placeholderShelter', asset('images/placeholder-shelter.jpg'));
        });

        View::composer('*', function ($view) {
            $view->with('placeholderBreed', asset('images/placeholder-breed.jpg'));
        });

        View::composer('*', function ($view) {
            $view->with('placeholderGlobalArticle', asset('images/placeholder-global-article.jpg'));
        });

        if (App::environment('local'))
        {

            View::composer('*', function ($view) {
                $view->with('novalidate', 'novalidate');
            });

        }
        else
        {
            View::composer('*', function ($view) {
                $view->with('novalidate', null);
            });
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        FRONTEND INTERFACE
        $this->app->bind(\App\Hipuppy\Interfaces\FrontendRepositoryInterface::class,function()
        {
            return new \App\Hipuppy\Repositories\FrontendRepository;
        });

//        BACKEND INTERFACE
        $this->app->bind(\App\Hipuppy\Interfaces\BackendRepositoryInterface::class,function()
        {
            return new \App\Hipuppy\Repositories\BackendRepository;
        });

//        ANIMAL INTERFACE
        $this->app->bind(\App\Hipuppy\Interfaces\AnimalRepositoryInterface::class,function()
        {
            return new \App\Hipuppy\Repositories\AnimalRepository();
        });

//        ANIMALS INTERFACE
        $this->app->bind(\App\Hipuppy\Interfaces\AnimalsRepositoryInterface::class,function()
        {
            return new \App\Hipuppy\Repositories\AnimalsRepository();
        });

//        SHELTER INTERFACE
        $this->app->bind(\App\Hipuppy\Interfaces\ShelterRepositoryInterface::class,function()
        {
            return new \App\Hipuppy\Repositories\ShelterRepository();
        });

//        SHELTERS INTERFACE
        $this->app->bind(\App\Hipuppy\Interfaces\SheltersRepositoryInterface::class,function()
        {
            return new \App\Hipuppy\Repositories\SheltersRepository();
        });

//        ADMIN INTERFACE
        $this->app->bind(\App\Hipuppy\Interfaces\AdminRepositoryInterface::class,function()
        {
            return new \App\Hipuppy\Repositories\AdminRepository();
        });

//        BREEDS INTERFACE
        $this->app->bind(\App\Hipuppy\Interfaces\BreedsRepositoryInterface::class,function()
        {
            return new \App\Hipuppy\Repositories\BreedsRepository();
        });
//        ADD ANIMAL INTERFACE
        $this->app->bind(\App\Hipuppy\Interfaces\AddAnimalRepositoryInterface::class,function()
        {
            return new \App\Hipuppy\Repositories\AddAnimalRepository();
        });

        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
