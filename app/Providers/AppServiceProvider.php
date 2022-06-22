<?php

namespace App\Providers;

use App\Classes\DiaChi;
use App\Contracts\DiaChiInterface;
use App\Contracts\GiaoHangInterface;
use App\Services\GiaoHangNhanh;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DiaChiInterface::class, function ($app) {
            return new DiaChi(config('services.ghn'));
        });
        $this->app->singleton(GiaoHangInterface::class, function ($app) {
            return new GiaoHangNhanh(config('services.ghn'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
