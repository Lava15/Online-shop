<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Catalog\Interfaces\CategoryServiceInterface;
use Modules\Catalog\Services\CategoryService;

final class BindingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            abstract: CategoryServiceInterface::class,
            concrete: CategoryService::class
        );
    }
}
