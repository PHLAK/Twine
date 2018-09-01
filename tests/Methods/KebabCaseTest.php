<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class KebabCaseTest extends TestCase
{
    public function test_it_can_convert_to_kebab_case()
    {
        $string = new Twine\Str('john pinkerton');

        $kebabCase = $string->kebabCase();

        $this->assertEquals('john-pinkerton', $kebabCase);
    }
}
