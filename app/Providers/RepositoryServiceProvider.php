<?php

namespace App\Providers;

use App\Repository\Post\IPostRepository;
use App\Repository\Post\PostRepository;
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

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IPostRepository::class, PostRepository::class);
    }
}
