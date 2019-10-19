<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

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
}
