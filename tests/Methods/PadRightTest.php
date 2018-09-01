<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class PadRightTest extends TestCase
{
    public function test_it_has_an_alias_for_pad_right()
    {
        $string = new Twine\Str('john pinkerton');

        $rightPadded = $string->padRight(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $rightPadded);
        $this->assertEquals('john pinkerton______', $rightPadded);
    }
}
