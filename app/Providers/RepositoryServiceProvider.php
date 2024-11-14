<?php

namespace App\Providers;

use App\Repository\Eloquent\Repository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\ManagerRepository;
use App\Repository\Eloquent\RoleRepository;
use App\Repository\Eloquent\PermissionRepository;

use App\Repository\PermissionRepositoryInterface;
use App\Repository\ManagerRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use App\Repository\RepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RepositoryInterface::class, Repository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(ManagerRepositoryInterface::class, ManagerRepository::class);

        $this->app->singleton(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->singleton(PermissionRepositoryInterface::class, PermissionRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
