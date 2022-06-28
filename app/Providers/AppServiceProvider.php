<?php

namespace App\Providers;

use App\Classes\DiaChi;
use App\Classes\StrMixin;
use App\Contracts\DiaChiInterface;
use App\Contracts\GiaoHangInterface;
use App\Services\GiaoHangNhanh;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     * @throws \ReflectionException
     */
    public function register()
    {
        $this->app->bind(DiaChiInterface::class, function ($app) {
            return new DiaChi(config('services.ghn'));
        });
        $this->app->singleton(GiaoHangInterface::class, function ($app) {
            return new GiaoHangNhanh(config('services.ghn'));
        });
        Str::mixin(new StrMixin());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
