<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class LastTest extends TestCase
{
    public function test_it_can_get_the_last_chunk_of_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $last = $string->last(9);

        $this->assertInstanceOf(Twine\Str::class, $last);
        $this->assertEquals('pinkerton', $last);
    }

    public function test_it_can_get_the_last_chunk_of_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $last = $string->last(3);

        $this->assertInstanceOf(Twine\Str::class, $last);
        $this->assertEquals('本 茂', $last);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $last = $string->last(9);

        $this->assertEquals('ASCII', mb_detect_encoding($last));
    }
}
