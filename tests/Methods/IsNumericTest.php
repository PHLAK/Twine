<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class IsNumericTest extends TestCase
{
    public function test_it_can_determine_if_the_string_is_numeric()
    {
        $string = new Twine\Str('1337');

        $numeric = $string->isNumeric();

        $this->assertTrue($numeric);
    }

    public function test_it_can_determine_if_the_string_is_not_numeric()
    {
        $string = new Twine\Str('john pinkerton');

        $notNumeric = $string->isNumeric();

        $this->assertFalse($notNumeric);
    }

    public function test_it_can_determine_if_a_multibyte_string_is_numeric()
    {
        $string = new Twine\Str('任天堂');

        $numeric = $string->isNumeric();

        $this->assertFalse($numeric);
    }
}
