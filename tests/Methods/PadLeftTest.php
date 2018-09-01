<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class PadLeftTest extends TestCase
{
    public function test_it_has_an_alias_for_pad_left()
    {
        $string = new Twine\Str('john pinkerton');

        $leftPadded = $string->padLeft(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $leftPadded);
        $this->assertEquals('______john pinkerton', $leftPadded);
    }
}
