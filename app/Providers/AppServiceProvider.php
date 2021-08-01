<?php

namespace App\Providers;

use App\Contracts\AbstractCrud;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SchoolController;
use App\Services\EmployeeCrudService;
use App\Services\SchoolCrudService;
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
        $this->app->when(SchoolController::class)
            ->needs(AbstractCrud::class)
            ->give(function () {
                return new SchoolCrudService;
            });

        $this->app->when(EmployeeController::class)
            ->needs(AbstractCrud::class)
            ->give(function () {
                return new EmployeeCrudService();
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
