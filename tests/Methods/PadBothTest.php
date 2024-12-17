<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class PadBothTest extends TestCase
{
    #[Test]
    public function it_can_be_both_padded(): void
    {
        $string = new Twine\Str('john pinkerton');

        $padded = $string->padBoth(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $padded);
        $this->assertEquals('___john pinkerton___', $padded);
    }

    public function a_multibyte_string_can_be_both_padded(): void
    {
        $string = new Twine\Str('宮本 茂');

        $padded = $string->padBoth(10, '_');

        $this->assertInstanceOf(Twine\Str::class, $padded);
        $this->assertEquals('___宮本 茂___', $padded);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $padded = $string->padBoth(20, '_');

        $this->assertEquals('ASCII', mb_detect_encoding($padded));
    }
}
