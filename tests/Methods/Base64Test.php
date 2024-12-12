<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class Base64Test extends TestCase
{
    public function test_it_can_be_base64_encoded()
    {
        $string = new Twine\Str('john pinkerton');

        $base64 = $string->base64();

        $this->assertInstanceOf(Twine\Str::class, $base64);
        $this->assertEquals('am9obiBwaW5rZXJ0b24=', $base64);

        return $base64;
    }

    #[\PHPUnit\Framework\Attributes\Depends('test_it_can_be_base64_encoded')]
    public function test_it_can_be_base64_decoded(Twine\Str $string)
    {
        $plaintext = $string->base64(Twine\Config\Base64::DECODE);

        $this->assertInstanceOf(Twine\Str::class, $plaintext);
        $this->assertEquals('john pinkerton', $plaintext);
    }

    public function test_it_throws_an_exception_when_base64_encoded_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(ConfigException::class);

        $string->base64('invalid');
    }

    public function test_a_multibyte_string_can_be_base64_encoded()
    {
        $string = new Twine\Str('宮本 茂');

        $base64 = $string->base64();

        $this->assertInstanceOf(Twine\Str::class, $base64);
        $this->assertEquals('5a6u5pysIOiMgg==', $base64);
    }
}
