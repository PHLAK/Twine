<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class SplitTest extends TestCase
{
    #[Test]
    public function it_can_be_split(): void
    {
        $string = new Twine\Str('john pinkerton');

        $chunks = $string->split(3);

        $this->assertEquals(['john ', 'pinke', 'rton'], $chunks);
        foreach ($chunks as $chunk) {
            $this->assertInstanceOf(Twine\Str::class, $chunk);
        }
    }

    public function a_multibyte_string_can_be_split(): void
    {
        $string = new Twine\Str('宮本 任天堂 茂');

        $chunks = $string->split(3);

        $this->assertEquals(['宮本 ', '任天堂', ' 茂'], $chunks);
        foreach ($chunks as $chunk) {
            $this->assertInstanceOf(Twine\Str::class, $chunk);
        }
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $chunks = $string->split(3);

        foreach ($chunks as $chunk) {
            $this->assertEquals('ASCII', mb_detect_encoding($chunk));
        }
    }
}
