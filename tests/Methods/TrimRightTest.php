<?php

namespace PHLAK\Twine\Tests\Methods;

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

    public function test_a_multibyte_string_can_be_right_trimmed()
    {
        $string = new Twine\Str('宮本 茂');

        $rightTrimmed = $string->trimRight('茂');

        $this->assertInstanceOf(Twine\Str::class, $rightTrimmed);
        $this->assertEquals('宮本 ', $rightTrimmed);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $rightTrimmed = $string->trimRight('jton');

        $this->assertAttributeEquals('ASCII', 'encoding', $rightTrimmed);
    }
}
