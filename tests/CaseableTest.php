<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class CaseableTest extends TestCase
{
    public function test_it_can_convert_to_camel_case()
    {
        $string = new Twine\Str('john pinkerton');

        $camelCase = $string->camelCase();

        $this->assertEquals('johnPinkerton', $camelCase);
    }

    public function test_it_can_convert_to_studly_case()
    {
        $string = new Twine\Str('john pinkerton');

        $studlyCase = $string->studlyCase();

        $this->assertEquals('JohnPinkerton', $studlyCase);
    }

    public function test_it_can_convert_to_pascal_case()
    {
        $string = new Twine\Str('john pinkerton');

        $pascalCase = $string->pascalCase();

        $this->assertEquals('JohnPinkerton', $pascalCase);
    }

    public function test_it_can_convert_to_snake_case()
    {
        $string = new Twine\Str('john pinkerton');

        $snakeCase = $string->snakeCase();

        $this->assertEquals('john_pinkerton', $snakeCase);
    }

    public function test_it_can_convert_to_kebab_case()
    {
        $string = new Twine\Str('john pinkerton');

        $kebabCase = $string->kebabCase();

        $this->assertEquals('john-pinkerton', $kebabCase);
    }
}
