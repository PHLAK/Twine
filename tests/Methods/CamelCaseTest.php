<?php

namespace PHLAK\Twine\Tests;

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
}
