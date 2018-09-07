<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class LastTest extends TestCase
{
    public function test_it_has_an_alias_for_last()
    {
        $string = new Twine\Str('john pinkerton');

        $last = $string->last(9);

        $this->assertInstanceOf(Twine\Str::class, $last);
        $this->assertEquals('pinkerton', $last);
    }
}
