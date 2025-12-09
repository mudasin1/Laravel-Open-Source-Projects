<?php

namespace App\Providers;

use App\Domain\Projects\Repositories\EloquentProjectRepository;
use App\Domain\Projects\Repositories\ProjectRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProjectRepositoryInterface::class, EloquentProjectRepository::class);
    }
}
