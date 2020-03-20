<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class StripTest extends TestCase
{
    public function test_it_can_be_stripped()
    {
        $string = new Twine\Str('john pinkerton');

        $striped = $string->strip('pink');

        $this->assertInstanceOf(Twine\Str::class, $striped);
        $this->assertEquals('john erton', $striped);
    }

    public function test_it_can_strip_multiple_strings_from_the_string()
    {
        $string = new Twine\Str('john pinkerton');

        $striped = $string->strip(['a', 'e', 'i', 'o', 'u']);

        $this->assertInstanceOf(Twine\Str::class, $striped);
        $this->assertEquals('jhn pnkrtn', $striped);
    }

    public function test_it_is_multibyte_compatible()
    {
        $string = new Twine\Str('宮本 茂');

        $stripped = $string->strip('本');

        $this->assertInstanceOf(Twine\Str::class, $stripped);
        $this->assertEquals('宮 茂', $stripped);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $stripped = $string->strip('pink');

        $this->assertEquals('ASCII', mb_detect_encoding($stripped));
    }
}
