<?php

namespace App\Providers;

use App\Repository\ContatoRepository;
use App\Repository\ContatoRepositoryInterface;
use App\Service\ContatoService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
			ContatoRepositoryInterface::class,
			ContatoRepository::class
		);
		$this->app->singleton(ContatoService::class, function ($app) {
		return new ContatoService($app->make(ContatoRepositoryInterface::class));
		});
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
