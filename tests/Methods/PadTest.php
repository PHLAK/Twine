<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use PHPUnit\Framework\TestCase;

class PadTest extends TestCase
{
    public function test_it_can_be_padded()
    {
        $string = new Twine\Str('john pinkerton');

        $padded = $string->pad(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $padded);
        $this->assertEquals('john pinkerton______', $padded);
    }

    public function test_it_can_be_right_padded()
    {
        $string = new Twine\Str('john pinkerton');

        $rightPadded = $string->pad(20, '_', Twine\Config\Pad::RIGHT);

        $this->assertInstanceOf(Twine\Str::class, $rightPadded);
        $this->assertEquals('john pinkerton______', $rightPadded);
    }

    public function test_it_can_be_left_padded()
    {
        $string = new Twine\Str('john pinkerton');

        $leftPadded = $string->pad(20, '_', Twine\Config\Pad::LEFT);

        $this->assertInstanceOf(Twine\Str::class, $leftPadded);
        $this->assertEquals('______john pinkerton', $leftPadded);
    }

    public function test_it_can_be_both_padded()
    {
        $string = new Twine\Str('john pinkerton');

        $bothPadded = $string->pad(20, '_', Twine\Config\Pad::BOTH);

        $this->assertInstanceOf(Twine\Str::class, $bothPadded);
        $this->assertEquals('___john pinkerton___', $bothPadded);
    }

    public function test_it_throws_an_exception_when_padding_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(ConfigException::class);

        $string->pad(20, '_', 99);
    }

    public function test_a_multibyte_string_can_be_padded()
    {
        $string = new Twine\Str('宮本 茂');

        $padded = $string->pad(10, '_');

        $this->assertInstanceOf(Twine\Str::class, $padded);
        $this->assertEquals('宮本 茂______', $padded);
    }

    public function test_a_multibyte_string_can_be_right_padded()
    {
        $string = new Twine\Str('宮本 茂');

        $rightPadded = $string->pad(10, '_', Twine\Config\Pad::RIGHT);

        $this->assertInstanceOf(Twine\Str::class, $rightPadded);
        $this->assertEquals('宮本 茂______', $rightPadded);
    }

    public function test_a_multibyte_string_can_be_left_padded()
    {
        $string = new Twine\Str('宮本 茂');

        $leftPadded = $string->pad(10, '_', Twine\Config\Pad::LEFT);

        $this->assertInstanceOf(Twine\Str::class, $leftPadded);
        $this->assertEquals('______宮本 茂', $leftPadded);
    }

    public function test_a_multibyte_string_can_be_both_padded()
    {
        $string = new Twine\Str('宮本 茂');

        $bothPadded = $string->pad(10, '_', Twine\Config\Pad::BOTH);

        $this->assertInstanceOf(Twine\Str::class, $bothPadded);
        $this->assertEquals('___宮本 茂___', $bothPadded);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $padded = $string->pad(20, '_');

        $this->assertAttributeEquals('ASCII', 'encoding', $padded);
    }
}
