<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class NthTest extends TestCase
{
    public function test_it_can_get_every_nth_character()
    {
        $string = new Twine\Str('john pinkerton');

        $nth = $string->nth(3);

        $this->assertInstanceOf(Twine\Str::class, $nth);
        $this->assertEquals('jnieo', $nth);
    }

    public function test_it_can_get_every_nth_character_starting_at_an_offset()
    {
        $string = new Twine\Str('john pinkerton');

        $nth = $string->nth(3, 2);

        $this->assertInstanceOf(Twine\Str::class, $nth);
        $this->assertEquals('hpkt', $nth);
    }

    public function test_it_can_get_every_nth_character_of_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 任天堂 茂');

        $nth = $string->nth(3);

        $this->assertInstanceOf(Twine\Str::class, $nth);
        $this->assertEquals('宮任 ', $nth);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $nth = $string->nth(3);

        $this->assertEquals('ASCII', mb_detect_encoding($nth));
    }
}
