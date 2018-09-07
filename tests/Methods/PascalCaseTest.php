<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class PascalCaseTest extends TestCase
{
    public function test_it_can_convert_to_pascal_case()
    {
        $string = new Twine\Str('john pinkerton');

        $pascalCase = $string->pascalCase();

        $this->assertInstanceOf(Twine\Str::class, $pascalCase);
        $this->assertEquals('JohnPinkerton', $pascalCase);
    }
}
