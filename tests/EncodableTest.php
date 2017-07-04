<?php

use Twine\Exceptions\InvalidConfigOptionException;

class EncodableTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->string = new Twine\Str('john pinkerton');
    }

    public function test_it_can_be_base64_encoded_and_decoded()
    {
        $string = $this->string->base64();

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('am9obiBwaW5rZXJ0b24=', $string);
        $this->assertEquals('john pinkerton', $string->base64(Twine\Config::BASE64_DECODE));
    }

    public function test_it_throws_an_exception_when_base64_encoded_with_an_invalid_config_option()
    {
        $this->expectException(InvalidConfigOptionException::class);

        $this->string->base64('invalid');
    }
}
