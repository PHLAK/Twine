<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class PadLeftTest extends TestCase
{
    public function test_it_can_be_left_padded()
    {
        $string = new Twine\Str('john pinkerton');

        $leftPadded = $string->padLeft(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $leftPadded);
        $this->assertEquals('______john pinkerton', $leftPadded);
    }

    public function test_a_multibyte_string_can_be_left_padded()
    {
        $string = new Twine\Str('宮本 茂');

        $leftPadded = $string->padLeft(10, '_');

        $this->assertInstanceOf(Twine\Str::class, $leftPadded);
        $this->assertEquals('______宮本 茂', $leftPadded);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $leftPadded = $string->padLeft(20, '_');

        $this->assertEquals('ASCII', mb_detect_encoding($leftPadded));
    }
}
