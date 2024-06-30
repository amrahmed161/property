<?php

namespace App\Providers;

use App\Interfaces\AMCInterface;
use App\Interfaces\UserInterface;
use App\Interfaces\VendorInterface;
use App\Repositories\AMCRepository;
use App\Repositories\UserRepository;
use App\Interfaces\CategoryInterface;
use App\Repositories\LoginRepository;
use App\Repositories\VendorRepository;
use App\Interfaces\VendorTypeInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\BookServiceInterface;
use App\Interfaces\ServiceTypeInterface;
use App\Repositories\CategoryRepository;
use App\Interfaces\SubControllerInterface;
use App\Repositories\VendorTypeRepository;
use App\Repositories\BookServiceRepository;
use App\Repositories\ServiceTypeRepository;
use App\Interfaces\LoginRepositoryInterface;
use App\Repositories\SubControllerRepository;
use App\Interfaces\DashboardControllerInterface;
use App\Repositories\DashboardControllerRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
        $this->app->bind(DashboardControllerInterface::class,DashboardControllerRepository::class);
        $this->app->bind(AMCInterface::class,AMCRepository::class);
        $this->app->bind(CategoryInterface::class,CategoryRepository::class);
        $this->app->bind(ServiceTypeInterface::class,ServiceTypeRepository::class);
        $this->app->bind(SubControllerInterface::class,SubControllerRepository::class);
        $this->app->bind(VendorTypeInterface::class,VendorTypeRepository::class);
        $this->app->bind(VendorInterface::class,VendorRepository::class);
        $this->app->bind(UserInterface::class,UserRepository::class);
        $this->app->bind(BookServiceInterface::class,BookServiceRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
