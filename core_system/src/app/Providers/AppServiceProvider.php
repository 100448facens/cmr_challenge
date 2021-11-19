<?php

namespace App\Providers;

use App\Daos\RepositoriesDao;
use App\Daos\SubjectsDao;
use App\Http\Services\SubjectService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SubjectService::class, function ($app) {
            $s = $this->app->get(SubjectsDao::class);
            $r = $this->app->get(RepositoriesDao::class);
            return new SubjectService($r, $s);
        });

        $this->app->singleton(SubjectsDao::class, function ($app) {
            return new SubjectsDao();
        });

        $this->app->singleton(RepositoriesDao::class, function ($app) {
            return new RepositoriesDao();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
