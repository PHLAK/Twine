<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class WrapTest extends TestCase
{
    public function test_it_can_be_wrapped()
    {
        $string = new Twine\Str('john pinkerton');

        $wrapped = $string->wrap(5);

        $this->assertInstanceOf(Twine\Str::class, $wrapped);
        $this->assertEquals("john\npinkerton", $wrapped);
    }

    public function test_it_can_be_soft_wrapped()
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedSoft = $string->wrap(5, "\n", Twine\Config\Wrap::SOFT);

        $this->assertInstanceOf(Twine\Str::class, $wrappedSoft);
        $this->assertEquals("john\npinkerton", $wrappedSoft);
    }

    public function test_it_can_be_hard_wrapped()
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedHard = $string->wrap(5, "\n", Twine\Config\Wrap::HARD);

        $this->assertInstanceOf(Twine\Str::class, $wrappedHard);
        $this->assertEquals("john\npinke\nrton", $wrappedHard);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $wraped = $string->wrap(5);

        $this->assertEquals('ASCII', mb_detect_encoding($wraped));
    }
}
