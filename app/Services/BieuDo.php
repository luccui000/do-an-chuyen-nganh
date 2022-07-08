<?php

namespace App\Services;

use App\Models\DonHang;
use Carbon\Carbon;

class BieuDo
{
    const DAY_IN_WEEK = 7;

    public function doanhthutuan()
    {
        $mapping = [
            'Monday'    => 'Thứ hai',
            'Tuesday'   => 'Thứ ba',
            'Wednesday' => 'Thứ tư',
            'Thursday'  => 'Thứ năm',
            'Friday'    => 'Thứ sáu',
            'Saturday'  => 'Thứ bảy',
            'Sunday'    => 'Chủ nhật',
        ];
        $now = Carbon::now();
        $startOfWeek = $now->subDays($now->dayOfWeek);
        $data = [];
        for($i = 1; $i <= self::DAY_IN_WEEK; $i++) {
            $data[] = intval(DonHang::where('created_at', '>=', $startOfWeek)
                ->whereDay('created_at', '=', $startOfWeek->day + $i)
                ->sum('tong_tien'));
        }
        return $data;
    }
}
