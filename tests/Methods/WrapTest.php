<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class WrapTests extends TestCase
{
    public function test_it_can_be_wrapped()
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedSoft = $string->wrap(5);
        $wrappedHard = $string->wrap(5, "\n", Twine\Config\Wrap::HARD);

        $this->assertInstanceOf(Twine\Str::class, $wrappedSoft);
        $this->assertEquals("john\npinkerton", $wrappedSoft);
        $this->assertEquals("john\npinke\nrton", $wrappedHard);
    }

    // TODO: public function test_it_is_multibyte_compatible()
}
