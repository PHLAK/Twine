<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class PadRightTest extends TestCase
{
    #[Test]
    public function it_can_be_right_padded(): void
    {
        $string = new Twine\Str('john pinkerton');

        $rightPadded = $string->padRight(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $rightPadded);
        $this->assertEquals('john pinkerton______', $rightPadded);
    }

    public function a_multibyte_string_can_be_right_padded(): void
    {
        $string = new Twine\Str('宮本 茂');

        $rightPadded = $string->padRight(10, '_');

        $this->assertInstanceOf(Twine\Str::class, $rightPadded);
        $this->assertEquals('宮本 茂______', $rightPadded);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $rightPadded = $string->padRight(20, '_');

        $this->assertEquals('ASCII', mb_detect_encoding($rightPadded));
    }
}
