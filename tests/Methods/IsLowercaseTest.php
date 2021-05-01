<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class IsLowercaseTest extends TestCase
{
    public function test_it_can_determine_if_the_string_is_lowercase()
    {
        $string = new Twine\Str('johnpinkerton');

        $lowercase = $string->isLowercase();

        $this->assertTrue($lowercase);
    }

    public function test_it_can_determine_if_the_string_is_not_lowercase()
    {
        $string = new Twine\Str('JohnPinkerton');

        $notLowercase = $string->isLowercase();

        $this->assertFalse($notLowercase);
    }

    public function test_it_can_determine_if_a_multibyte_string_is_lowercase()
    {
        $string = new Twine\Str('任天堂');

        $lowercase = $string->isLowercase();

        $this->assertFalse($lowercase);
    }
}
