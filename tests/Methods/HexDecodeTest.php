<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class HexDecodeTest extends TestCase
{
    public function test_it_can_be_hex_decoded()
    {
        $string = new Twine\Str('\x6a\x6f\x68\x6e\x20\x70\x69\x6e\x6b\x65\x72\x74\x6f\x6e');

        $plaintext = $string->hex(Twine\Config\Hex::DECODE);
        $alias = $string->hexDecode();

        $this->assertInstanceOf(Twine\Str::class, $alias);
        $this->assertEquals($plaintext, $alias);
    }
}
