<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class SnakeCaseTest extends TestCase
{
    public function test_it_can_convert_to_snake_case()
    {
        $string = new Twine\Str('john pinkerton');

        $snakeCase = $string->snakeCase();

        $this->assertEquals('john_pinkerton', $snakeCase);
    }
}
