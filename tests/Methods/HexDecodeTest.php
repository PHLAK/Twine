<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class HexDecodeTest extends TestCase
{
    public function test_it_can_be_hex_decoded()
    {
        $string = new Twine\Str('\x6a\x6f\x68\x6e\x20\x70\x69\x6e\x6b\x65\x72\x74\x6f\x6e');

        $plaintext = $string->hexDecode();

        $this->assertInstanceOf(Twine\Str::class, $plaintext);
        $this->assertEquals('john pinkerton', $plaintext);
    }

    public function test_a_multibyte_string_can_be_hex_decoded()
    {
        $string = new Twine\Str('\x5bae\x672c\x20\x8302');

        $plaintext = $string->hexDecode();

        $this->assertInstanceOf(Twine\Str::class, $plaintext);
        $this->assertEquals('宮本 茂', $plaintext);
    }
}
