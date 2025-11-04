<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Storage\UserRepository;
use App\Storage\Implementations\DbUserRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, DbUserRepository::class);
    }
}
