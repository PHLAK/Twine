<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class WrapHardTest extends TestCase
{
    public function test_it_can_be_hard_wrapped()
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedHard = $string->wrapHard(5);

        $this->assertInstanceOf(Twine\Str::class, $wrappedHard);
        $this->assertEquals("john\npinke\nrton", $wrappedHard);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $wrappedHard = $string->wrapHard(5);

        $this->assertEquals('ASCII', mb_detect_encoding($wrappedHard));
    }
}
