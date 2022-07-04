<?php

namespace App\Filters;

use App\Traits\HasSearchable;
use App\Traits\HasSortable;

class SanPhamFilter extends QueryFilter
{
    use HasSortable, HasSearchable;
}
