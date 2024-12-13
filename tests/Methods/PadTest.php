<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class PadTest extends TestCase
{
    #[Test]
    public function it_can_be_padded(): void
    {
        $string = new Twine\Str('john pinkerton');

        $padded = $string->pad(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $padded);
        $this->assertEquals('john pinkerton______', $padded);
    }

    #[Test]
    public function it_can_be_right_padded(): void
    {
        $string = new Twine\Str('john pinkerton');

        $rightPadded = $string->pad(20, '_', Twine\Config\Pad::RIGHT);

        $this->assertInstanceOf(Twine\Str::class, $rightPadded);
        $this->assertEquals('john pinkerton______', $rightPadded);
    }

    #[Test]
    public function it_can_be_left_padded(): void
    {
        $string = new Twine\Str('john pinkerton');

        $leftPadded = $string->pad(20, '_', Twine\Config\Pad::LEFT);

        $this->assertInstanceOf(Twine\Str::class, $leftPadded);
        $this->assertEquals('______john pinkerton', $leftPadded);
    }

    #[Test]
    public function it_can_be_both_padded(): void
    {
        $string = new Twine\Str('john pinkerton');

        $bothPadded = $string->pad(20, '_', Twine\Config\Pad::BOTH);

        $this->assertInstanceOf(Twine\Str::class, $bothPadded);
        $this->assertEquals('___john pinkerton___', $bothPadded);
    }

    #[Test]
    public function it_throws_an_exception_when_padding_with_an_invalid_config_option(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(ConfigException::class);

        $string->pad(20, '_', 99);
    }

    public function a_multibyte_string_can_be_padded(): void
    {
        $string = new Twine\Str('宮本 茂');

        $padded = $string->pad(10, '_');

        $this->assertInstanceOf(Twine\Str::class, $padded);
        $this->assertEquals('宮本 茂______', $padded);
    }

    public function a_multibyte_string_can_be_right_padded(): void
    {
        $string = new Twine\Str('宮本 茂');

        $rightPadded = $string->pad(10, '_', Twine\Config\Pad::RIGHT);

        $this->assertInstanceOf(Twine\Str::class, $rightPadded);
        $this->assertEquals('宮本 茂______', $rightPadded);
    }

    public function a_multibyte_string_can_be_left_padded(): void
    {
        $string = new Twine\Str('宮本 茂');

        $leftPadded = $string->pad(10, '_', Twine\Config\Pad::LEFT);

        $this->assertInstanceOf(Twine\Str::class, $leftPadded);
        $this->assertEquals('______宮本 茂', $leftPadded);
    }

    public function a_multibyte_string_can_be_both_padded(): void
    {
        $string = new Twine\Str('宮本 茂');

        $bothPadded = $string->pad(10, '_', Twine\Config\Pad::BOTH);

        $this->assertInstanceOf(Twine\Str::class, $bothPadded);
        $this->assertEquals('___宮本 茂___', $bothPadded);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $padded = $string->pad(20, '_');

        $this->assertEquals('ASCII', mb_detect_encoding($padded));
    }
}
