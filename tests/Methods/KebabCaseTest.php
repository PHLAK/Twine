<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class KebabCaseTest extends TestCase
{
    public function test_it_can_convert_to_kebab_case()
    {
        $string = new Twine\Str('john pinkerton');

        $kebabCase = $string->kebabCase();

        $this->assertInstanceOf(Twine\Str::class, $kebabCase);
        $this->assertEquals('john-pinkerton', $kebabCase);
    }

    public function test_it_a_multibyte_string_can_be_converted_to_kebab_case()
    {
        $string = new Twine\Str('джон пинкертон');

        $kebabCase = $string->kebabCase();

        $this->assertInstanceOf(Twine\Str::class, $kebabCase);
        $this->assertEquals('джон-пинкертон', $kebabCase);
    }
}
