<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

       $centralDomains = $this->centralDomains();
    //    dd($centralDomains);
    $this->routes(function () use ($centralDomains){
        foreach($centralDomains as $domains){
            Route::middleware('api')
            ->prefix('api')
            ->domain($domain)
            ->group(base_path('routes/api/'.$domain.'.php'));
            
            Route::middleware('web')
            ->domain($domain)
            ->group(base_path('routes/web/'.$domain.'.php'));
        }
    });


    }

    protected function centralDomains()
    {

        return config('tenancy.central_domains');
    }
}
