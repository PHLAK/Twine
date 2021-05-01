<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class ContainsTest extends TestCase
{
    public function test_it_can_determine_if_it_contains_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue($string->contains('pink'));
        $this->assertFalse($string->contains('purple'));
    }

    public function test_it_can_determine_if_a_multibyte_string_contains_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $this->assertTrue($string->contains('宮本'));
        $this->assertFalse($string->contains('任天堂'));
    }
}
