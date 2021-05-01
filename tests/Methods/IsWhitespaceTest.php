<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class IsWhitespaceTest extends TestCase
{
    public function test_it_can_determine_if_the_string_is_whitespace()
    {
        $string = new Twine\Str(" \r\n\t");

        $whitespace = $string->isWhitespace();

        $this->assertTrue($whitespace);
    }

    public function test_it_can_determine_if_the_string_is_not_whitespace()
    {
        $string = new Twine\Str('john pinkerton');

        $notWhitespace = $string->isWhitespace();

        $this->assertFalse($notWhitespace);
    }

    public function test_it_can_determine_if_a_multibyte_string_is_whitespace()
    {
        $string = new Twine\Str('任天堂');

        $whitespace = $string->isWhitespace();

        $this->assertFalse($whitespace);
    }
}
