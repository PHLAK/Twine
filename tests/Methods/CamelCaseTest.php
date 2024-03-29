<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class CamelCaseTest extends TestCase
{
    public function test_it_can_be_converted_to_camel_case()
    {
        $string = new Twine\Str('john pinkerton');

        $camelCase = $string->camelCase();

        $this->assertInstanceOf(Twine\Str::class, $camelCase);
        $this->assertEquals('johnPinkerton', $camelCase);
    }

    public function test_it_a_multibyte_string_can_be_converted_to_camel_case()
    {
        $string = new Twine\Str('джон пинкертон');

        $camelCase = $string->camelCase();

        $this->assertInstanceOf(Twine\Str::class, $camelCase);
        $this->assertEquals('джонПинкертон', $camelCase);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $camelCase = $string->camelCase();

        $this->assertEquals('ASCII', mb_detect_encoding($camelCase));
    }
}
