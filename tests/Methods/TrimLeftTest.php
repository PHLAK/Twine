<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class TrimLeftTest extends TestCase
{
    public function test_it_can_be_left_trimmed()
    {
        $string = new Twine\Str('john pinkerton');

        $leftTrimmed = $string->trimLeft('jton');

        $this->assertInstanceOf(Twine\Str::class, $leftTrimmed);
        $this->assertEquals('hn pinkerton', $leftTrimmed);
    }
}
