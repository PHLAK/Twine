<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class PadBothTest extends TestCase
{
    public function test_it_can_be_both_padded()
    {
        $string = new Twine\Str('john pinkerton');

        $padded = $string->padBoth(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $padded);
        $this->assertEquals('___john pinkerton___', $padded);
    }
}
