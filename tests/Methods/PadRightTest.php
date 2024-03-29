<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class PadRightTest extends TestCase
{
    public function test_it_can_be_right_padded()
    {
        $string = new Twine\Str('john pinkerton');

        $rightPadded = $string->padRight(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $rightPadded);
        $this->assertEquals('john pinkerton______', $rightPadded);
    }

    public function test_a_multibyte_string_can_be_right_padded()
    {
        $string = new Twine\Str('宮本 茂');

        $rightPadded = $string->padRight(10, '_');

        $this->assertInstanceOf(Twine\Str::class, $rightPadded);
        $this->assertEquals('宮本 茂______', $rightPadded);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $rightPadded = $string->padRight(20, '_');

        $this->assertEquals('ASCII', mb_detect_encoding($rightPadded));
    }
}
