<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class IsPrintableTest extends TestCase
{
    public function test_it_can_determine_if_the_string_is_printable()
    {
        $string = new Twine\Str('john pinkerton');

        $printable = $string->isPrintable();

        $this->assertTrue($printable);
    }

    public function test_it_can_determine_if_the_string_is_not_printable()
    {
        $string = new Twine\Str("john\npinkerton");

        $notPrintable = $string->isPrintable();

        $this->assertFalse($notPrintable);
    }

    public function test_it_can_determine_if_a_multibyte_string_is_printable()
    {
        $string = new Twine\Str('任天堂');

        $printable = $string->isPrintable();

        $this->assertFalse($printable);
    }
}
