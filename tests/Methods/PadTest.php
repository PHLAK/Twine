<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use PHPUnit\Framework\TestCase;

class PadTest extends TestCase
{
    public function test_it_can_be_padded()
    {
        $string = new Twine\Str('john pinkerton');

        $padded = $string->pad(20, '_');
        $rightPad = $string->pad(20, '_', Twine\Config\Pad::RIGHT);
        $leftPad = $string->pad(20, '_', Twine\Config\Pad::LEFT);
        $bothPad = $string->pad(20, '_', Twine\Config\Pad::BOTH);

        $this->assertInstanceOf(Twine\Str::class, $padded);
        $this->assertEquals('john pinkerton______', $padded);
        $this->assertEquals('john pinkerton______', $rightPad);
        $this->assertEquals('______john pinkerton', $leftPad);
        $this->assertEquals('___john pinkerton___', $bothPad);
    }

    public function test_it_throws_an_exception_when_padding_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(ConfigException::class);

        $string->pad(20, '_', 99);
    }

    // TODO: Multibyte compatiblity test
    // public function test_it_is_multibyte_compatible()
    // {
    //     $string = new Twine\Str('宮本 茂');
    //
    //     $padded = $string->pad(10, '_');
    //     $rightPad = $string->pad(10, '_', Twine\Config\Pad::RIGHT);
    //     $leftPad = $string->pad(10, '_', Twine\Config\Pad::LEFT);
    //     $bothPad = $string->pad(10, '_', Twine\Config\Pad::BOTH);
    //
    //     $this->assertInstanceOf(Twine\Str::class, $padded);
    //     $this->assertEquals('宮本 茂______', $padded);
    //     $this->assertEquals('宮本 茂______', $rightPad);
    //     $this->assertEquals('______宮本 茂', $leftPad);
    //     $this->assertEquals('___宮本 茂___', $bothPad);
    // }
}
