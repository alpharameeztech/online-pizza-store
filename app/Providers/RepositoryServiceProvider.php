<?php

namespace App\Providers;

use App\Repositories\Interfaces\ItemRepositoryInterface;
use App\Repositories\ItemRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ItemRepositoryInterface::class,
            ItemRepository::class
        );
    }
}
