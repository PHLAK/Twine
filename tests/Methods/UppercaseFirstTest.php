<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use PHPUnit\Framework\TestCase;

class UppercaseFirstTest extends TestCase
{
    public function test_it_has_an_alias_for_uppercase_first()
    {
        $string = new Twine\Str('john pinkerton');

        $ucFirst = $string->uppercase(Twine\Config\Uppercase::FIRST);
        $alias = $string->uppercaseFirst();

        $this->assertInstanceOf(Twine\Str::class, $alias);
        $this->assertEquals($ucFirst, $alias);
    }
}
