<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class WrapSoftTest extends TestCase
{
    public function test_it_can_be_soft_wrapped()
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedSoft = $string->wrapSoft(5);

        $this->assertInstanceOf(Twine\Str::class, $wrappedSoft);
        $this->assertEquals("john\npinkerton", $wrappedSoft);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $wrappedSoft = $string->wrapSoft(5);

        $this->assertAttributeEquals('ASCII', 'encoding', $wrappedSoft);
    }
}
