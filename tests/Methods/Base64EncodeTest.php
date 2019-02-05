<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class Base64EncodeTest extends TestCase
{
    public function test_it_has_can_be_base64_encoded()
    {
        $string = new Twine\Str('john pinkerton');

        $base64 = $string->base64Encode();

        $this->assertInstanceOf(Twine\Str::class, $base64);
        $this->assertEquals('am9obiBwaW5rZXJ0b24=', $base64);
    }

    public function test_a_multibyte_string_can_be_base64_encoded()
    {
        $string = new Twine\Str('宮本 茂');

        $base64 = $string->base64Encode();

        $this->assertInstanceOf(Twine\Str::class, $base64);
        $this->assertEquals('5a6u5pysIOiMgg==', $base64);
    }
}
