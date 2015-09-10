<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
        /**
     * @var array
     */
    protected $contractArray = [
        'App\Users\Repositories\UserRepository' => 'App\Users\Repositories\DoctrineUser',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bindContracts($this->contractArray);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * @param $array
     */
    public function bindContracts($array)
    {
        foreach ($array as $contract => $class) {
            $this->app->bind($contract, $class);
        }
    }
}
