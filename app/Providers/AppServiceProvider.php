<?php

namespace App\Providers;

use App\Classes\DiaChi;
use App\Classes\StrMixin;
use App\Contracts\DiaChiInterface;
use App\Contracts\GiaoHangInterface;
use App\Contracts\ThanhToanGateway;
use App\Services\GiaoHangNhanh;
use App\Services\VNPay;
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
        $this->app->bind(DiaChiInterface::class, function () {
            return new DiaChi(config('services.ghn'));
        });
        $this->app->singleton(GiaoHangInterface::class, function () {
            return new GiaoHangNhanh(config('services.ghn'));
        });
        $this->app->singleton(ThanhToanGateway::class, function() {
            return new VNPay(config('services.vnpay'));
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
