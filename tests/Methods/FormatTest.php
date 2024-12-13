<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class FormatTest extends TestCase
{
    #[Test]
    public function it_can_be_formatted(): void
    {
        $string = new Twine\Str('Hello %s! Welcome to %s, population %b.');

        $formatted = $string->format('John', 'Pinkertown', 1337);

        $this->assertInstanceOf(Twine\Str::class, $formatted);
        $this->assertEquals('Hello John! Welcome to Pinkertown, population 10100111001.', $formatted);
    }

    public function a_multibyte_string_can_be_formatted(): void
    {
        $string = new Twine\Str('こんにちは, %s! ようこそ %s.');

        $formatted = $string->format('宮本 茂', '任天堂');

        $this->assertInstanceOf(Twine\Str::class, $formatted);
        $this->assertEquals('こんにちは, 宮本 茂! ようこそ 任天堂.', $formatted);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('Hello %s! Welcome to %s, population %b.', 'ASCII');

        $formatted = $string->format('John', 'Pinkertown', 1337);

        $this->assertEquals('ASCII', mb_detect_encoding($formatted));
    }
}
