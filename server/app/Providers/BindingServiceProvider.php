<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Product\Interfaces\CategoryServiceInterface;
use Modules\Product\Interfaces\ProductServiceInterface;
use Modules\Product\Services\CategoryService;
use Modules\Product\Services\ProductService;

final class BindingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            abstract: CategoryServiceInterface::class,
            concrete: CategoryService::class
        );
        $this->app->bind(
            abstract: ProductServiceInterface::class,
            concrete: ProductService::class
        );
    }
}
