<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class HexEncodeTest extends TestCase
{
    public function test_it_can_be_hex_encoded()
    {
        $string = new Twine\Str('john pinkerton');

        $hex = $string->hex(Twine\Config\Hex::ENCODE);
        $alias = $string->hexEncode();

        $this->assertInstanceOf(Twine\Str::class, $alias);
        $this->assertEquals($hex, $alias);
    }
}
