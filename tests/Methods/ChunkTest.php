<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class ChunkTest extends TestCase
{
    #[Test]
    public function it_can_be_split_into_chunks(): void
    {
        $string = new Twine\Str('john pinkerton');

        $chunks = $string->chunk(3);

        $this->assertEquals(['joh', 'n p', 'ink', 'ert', 'on'], $chunks);
        foreach ($chunks as $chunk) {
            $this->assertInstanceOf(Twine\Str::class, $chunk);
        }
    }

    public function a_multibyte_string_can_be_chunked(): void
    {
        $string = new Twine\Str('宮本 任天堂 茂');

        $chunks = $string->chunk(3);

        $this->assertEquals(['宮本 ', '任天堂', ' 茂'], $chunks);
        foreach ($chunks as $chunk) {
            $this->assertInstanceOf(Twine\Str::class, $chunk);
        }
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $chunks = $string->chunk(3);

        foreach ($chunks as $chunk) {
            $this->assertEquals('ASCII', mb_detect_encoding($chunk));
        }
    }
}
