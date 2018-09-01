<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class TrimRightTest extends TestCase
{
    public function test_it_can_be_right_trimmed()
    {
        $string = new Twine\Str('john pinkerton');

        $rightTrimmed = $string->trimRight('jton');

        $this->assertInstanceOf(Twine\Str::class, $rightTrimmed);
        $this->assertEquals('john pinker', $rightTrimmed);
    }
}
