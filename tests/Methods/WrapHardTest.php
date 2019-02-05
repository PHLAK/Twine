<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class WrapHardTest extends TestCase
{
    public function test_it_can_be_hard_wrapped()
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedHard = $string->wrapHard(5);

        $this->assertInstanceOf(Twine\Str::class, $wrappedHard);
        $this->assertEquals("john\npinke\nrton", $wrappedHard);
    }
}
