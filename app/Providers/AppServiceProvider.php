<?php

namespace App\Providers;

use App\Repositories\Contracts\ISocialRepository;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\User\SocialRepository;
use App\Repositories\User\UserRepository;
use App\Services\Contracts\IAuthService;
use App\Services\Contracts\IFiltersInputService;
use App\Services\Contracts\IInputService;
use App\Services\Contracts\IRelationsInputService;
use App\Services\Helpers\FiltersInputService;
use App\Services\Helpers\InputService;
use App\Services\Helpers\RelationsInputService;
use App\Services\User\AuthService;
use Blade;
use Former;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::setContentTags('{!', '!}');            // for variables and all things Blade
        Blade::setEscapedContentTags('{!!', '!!}');   // for escaped data
        Former::framework('TwitterBootstrap3');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Registering services to their implementations for IoC container

        // BEGIN Helper services
        $this->app->bind(IInputService::class, InputService::class);
        $this->app->bind(IFiltersInputService::class, FiltersInputService::class);
        $this->app->bind(IRelationsInputService::class, RelationsInputService::class);
        // END
        // BEGIN User services
        $this->app->bind(IAuthService::class, AuthService::class);
        // END

        // Registering repositories to their implementations for IoC container
        $this->app->bind(ISocialRepository::class, SocialRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
    }
}
