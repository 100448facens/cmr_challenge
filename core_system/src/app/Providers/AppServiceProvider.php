<?php

namespace App\Providers;

use App\Daos\ProjectsDao;
use App\Daos\RepositoriesDao;
use App\Daos\SubjectsDao;
use App\Http\Services\RepositoryService;
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
            $r = $this->app->get(RepositoriesDao::class);
            $p = $this->app->get(ProjectsDao::class);
            $s = $this->app->get(SubjectsDao::class);
            return new SubjectService($r, $p, $s);
        });

        $this->app->singleton(RepositoryService::class, function ($app) {
            $s = $this->app->get(SubjectsDao::class);
            $r = $this->app->get(RepositoriesDao::class);
            $p = $this->app->get(ProjectsDao::class);
            return new RepositoryService($r, $p, $s);
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
