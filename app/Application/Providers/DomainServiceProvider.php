<?php


namespace App\Application\Providers;

use App\Domain\Contracts\Movie\MovieContract;
use App\Infrastructure\Persistance\Movie\MovieRepository;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap domain application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register domain application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MovieContract::class, MovieRepository::class);
    }
}

