<?php

namespace Tests\Unit;

use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class SanPhamTest extends TestCase
{
    /** @test */
    public function it_test_str_bodau()
    {
        $result = Str::bodau("Thạch Minh Lực");
        $expected = "Thach Minh Luc";
        $this->assertSame($expected, $result);
    }
}
