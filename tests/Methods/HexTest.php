<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class HexTest extends TestCase
{
    public function test_it_can_be_hex_encoded()
    {
        $string = new Twine\Str('john pinkerton');

        $hex = $string->hex();

        $this->assertInstanceOf(Twine\Str::class, $hex);
        $this->assertEquals('\x6a\x6f\x68\x6e\x20\x70\x69\x6e\x6b\x65\x72\x74\x6f\x6e', $hex);

        return $hex;
    }

    /** @depends test_it_can_be_hex_encoded */
    public function test_it_can_be_hex_decoded(Twine\Str $hex)
    {
        $plaintext = $hex->hex(Twine\Config\Hex::DECODE);

        $this->assertInstanceOf(Twine\Str::class, $plaintext);
        $this->assertEquals('john pinkerton', $plaintext);
    }

    public function test_a_multibyte_string_can_be_hex_encoded()
    {
        $string = new Twine\Str('宮本 茂');

        $hex = $string->hex();

        $this->assertInstanceOf(Twine\Str::class, $hex);
        $this->assertEquals('\x5bae\x672c\x20\x8302', $hex);

        return $hex;
    }

    /** @depends test_a_multibyte_string_can_be_hex_encoded */
    public function test_a_multibyte_string_can_be_hex_decoded(Twine\Str $hex)
    {
        $plaintext = $hex->hex(Twine\Config\Hex::DECODE);

        $this->assertInstanceOf(Twine\Str::class, $plaintext);
        $this->assertEquals('宮本 茂', $plaintext);
    }
}
