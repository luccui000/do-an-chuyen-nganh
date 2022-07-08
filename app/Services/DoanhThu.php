<?php

namespace App\Services;

use App\Models\DonHang;
use Carbon\Carbon;

class DoanhThu
{
    const DAY_IN_WEEK = 7;

    public function tuantruoc()
    {
        $startOfPrevWeek = Carbon::now()->subDays(
            Carbon::now()->dayOfWeek + self::DAY_IN_WEEK
        );
        $endOfPrevWeek = Carbon::now()->subDays(
            Carbon::now()->dayOfWeek
        );
        $dt = DonHang::where('created_at', '>=', $startOfPrevWeek)
            ->where('created_at', '<', $endOfPrevWeek)
            ->sum('tong_tien');

        return $dt;
    }
    public function tuannay()
    {
        $now = Carbon::now();
        $startOfWeek = $now->subDays($now->dayOfWeek);
        $dt = DonHang::where('created_at', '>=', $startOfWeek)
            ->sum('tong_tien');

        return $dt;
    }
    public function thangtruoc()
    {
        $prevMonth = Carbon::now()->subMonth(1);
        $dt = DonHang::whereMonth('created_at', '=', $prevMonth)
            ->sum('tong_tien');

        return $dt;
    }
    public function thangnay()
    {
        $currMonth = Carbon::now()->month;
        $dt = DonHang::whereMonth('created_at', '=', $currMonth)
            ->sum('tong_tien');
        return $dt;
    }
    public function namnay()
    {
        $currYear = Carbon::now()->year;
        $dt = DonHang::whereYear('created_at', '=', $currYear)
            ->sum('tong_tien');
        return $dt;
    }
}
