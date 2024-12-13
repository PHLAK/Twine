<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class PadLeftTest extends TestCase
{
    #[Test]
    public function it_can_be_left_padded(): void
    {
        $string = new Twine\Str('john pinkerton');

        $leftPadded = $string->padLeft(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $leftPadded);
        $this->assertEquals('______john pinkerton', $leftPadded);
    }

    public function a_multibyte_string_can_be_left_padded(): void
    {
        $string = new Twine\Str('宮本 茂');

        $leftPadded = $string->padLeft(10, '_');

        $this->assertInstanceOf(Twine\Str::class, $leftPadded);
        $this->assertEquals('______宮本 茂', $leftPadded);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $leftPadded = $string->padLeft(20, '_');

        $this->assertEquals('ASCII', mb_detect_encoding($leftPadded));
    }
}
