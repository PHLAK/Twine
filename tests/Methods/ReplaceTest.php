<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class ReplaceTest extends TestCase
{
    public function test_it_can_replace_parts_of_the_string()
    {
        $string = new Twine\Str('john pinkerton');

        $replaced = $string->replace('john', 'bob', $count);

        $this->assertInstanceOf(Twine\Str::class, $replaced);
        $this->assertEquals('bob pinkerton', $replaced);
        $this->assertEquals(1, $count);
    }

    public function test_it_can_replace_multiple_strings_at_once()
    {
        $string = new Twine\Str('john pinkerton');

        $replaced = $string->replace(['o', 'n'], ['a', 'm']);

        $this->assertEquals('jahm pimkertam', $replaced);
    }

    public function test_it_is_multibyte_compatible()
    {
        $string = new Twine\Str('宮本 茂');

        $replaced = $string->replace('茂', '任天堂');

        $this->assertInstanceOf(Twine\Str::class, $replaced);
        $this->assertEquals('宮本 任天堂', $replaced);
    }
}
