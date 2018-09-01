<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class Crc32Test extends TestCase
{
    public function test_it_can_calculate_the_crc32_polynomial()
    {
        $string = new Twine\Str('john pinkerton');

        $crc32 = $string->crc32();

        $this->assertEquals(3367853299, $crc32);
    }

    public function test_it_can_calculate_the_crc32_polynomial_of_a_multibyte_compatible()
    {
        $string = new Twine\Str('宮本 茂');

        $crc32 = $string->crc32();

        $this->assertEquals(2376085100, $crc32);
    }
}
