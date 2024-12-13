<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class EchoTest extends TestCase
{
    #[Test]
    public function it_can_be_echoed(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectOutputString('john pinkerton');

        $echoed = $string->echo();

        $this->assertInstanceOf(Twine\Str::class, $echoed);
        $this->assertEquals('john pinkerton', $echoed);
    }

    public function a_multibyte_string_can_be_echoed(): void
    {
        $string = new Twine\Str('宮本 茂');

        $this->expectOutputString('宮本 茂');

        $echoed = $string->echo();

        $this->assertInstanceOf(Twine\Str::class, $echoed);
        $this->assertEquals('宮本 茂', $echoed);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $this->expectOutputString('john pinkerton');

        $echoed = $string->echo();

        $this->assertEquals('ASCII', mb_detect_encoding($echoed));
    }
}
