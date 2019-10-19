<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class Base64DecodeTest extends TestCase
{
    public function test_it_can_be_base64_decoded()
    {
        $string = new Twine\Str('am9obiBwaW5rZXJ0b24=');

        $plaintext = $string->base64Decode();

        $this->assertInstanceOf(Twine\Str::class, $plaintext);
        $this->assertEquals('john pinkerton', $plaintext);
    }

    public function test_a_multibyte_string_can_be_base64_decoded()
    {
        $string = new Twine\Str('5a6u5pysIOiMgg==');

        $plaintext = $string->base64Decode();

        $this->assertInstanceOf(Twine\Str::class, $plaintext);
        $this->assertEquals('宮本 茂', $plaintext);
    }
}
