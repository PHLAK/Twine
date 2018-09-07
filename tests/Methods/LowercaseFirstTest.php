<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use PHPUnit\Framework\TestCase;

class LowercaseFirstTest extends TestCase
{
    public function test_it_has_an_alias_for_lowercase_first()
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcFirst = $string->lowercase(Twine\Config\Lowercase::FIRST);
        $alias = $string->lowercaseFirst();

        $this->assertInstanceOf(Twine\Str::class, $alias);
        $this->assertEquals($lcFirst, $alias);
    }
}
