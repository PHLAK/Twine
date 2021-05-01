<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class IsUppercaseTest extends TestCase
{
    public function test_it_can_determine_if_the_string_is_uppercase()
    {
        $string = new Twine\Str('JOHNPINKERTON');

        $uppercase = $string->isUppercase();

        $this->assertTrue($uppercase);
    }

    public function test_it_can_determine_if_the_string_is_not_uppercase()
    {
        $string = new Twine\Str('JohnPinkerton');

        $notUppercase = $string->isUppercase();

        $this->assertFalse($notUppercase);
    }

    public function test_it_can_determine_if_a_multibyte_string_is_uppercase()
    {
        $string = new Twine\Str('任天堂');

        $uppercase = $string->isUppercase();

        $this->assertFalse($uppercase);
    }
}
