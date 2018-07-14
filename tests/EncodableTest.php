<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\InvalidConfigOptionException;
use PHPUnit\Framework\TestCase;

class EncodableTest extends TestCase
{
    public function test_it_can_be_base64_encoded()
    {
        $string = new Twine\Str('john pinkerton');

        $base64 = $string->base64();

        $this->assertInstanceOf(Twine\Str::class, $base64);
        $this->assertEquals('am9obiBwaW5rZXJ0b24=', $base64);

        return $base64;
    }

    /** @depends test_it_can_be_base64_encoded */
    public function test_it_can_be_base64_decoded(Twine\Str $string)
    {
        $plaintext = $string->base64(Twine\Config\Base64::DECODE);

        $this->assertInstanceOf(Twine\Str::class, $plaintext);
        $this->assertEquals('john pinkerton', $plaintext);
    }

    public function test_it_throws_an_exception_when_base64_encoded_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(InvalidConfigOptionException::class);

        $string->base64('invalid');
    }

    public function test_it_can_url_encode_the_string()
    {
        $string = new Twine\Str('john pinkerton');

        $urlencoded = $string->urlencode();

        $this->assertEquals('john+pinkerton', $urlencoded);
    }
}
