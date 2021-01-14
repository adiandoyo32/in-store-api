<?php

namespace App\Providers;

use App\Services\Category\CategoryService;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
    }
}
