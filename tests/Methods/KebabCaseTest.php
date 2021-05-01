<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

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

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $kebabCase = $string->kebabCase();

        $this->assertEquals('ASCII', mb_detect_encoding($kebabCase));
    }
}
