<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class LengthTest extends TestCase
{
    public function test_it_has_a_length()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertEquals(14, $string->length());
    }

    public function test_a_multibyte_string_has_a_length()
    {
        $string = new Twine\Str('宮本 茂');

        $length = $string->length();

        $this->assertEquals(4, $length);
    }
}
