<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class ChunkTest extends TestCase
{
    public function test_it_can_be_split_into_chunks()
    {
        $string = new Twine\Str('john pinkerton');

        $chunks = $string->chunk(3);

        $this->assertEquals(['joh', 'n p', 'ink', 'ert', 'on'], $chunks);
        foreach ($chunks as $chunk) {
            $this->assertInstanceOf(Twine\Str::class, $chunk);
        }
    }

    public function test_a_multibyte_string_can_be_chunked()
    {
        $string = new Twine\Str('宮本 任天堂 茂');

        $chunks = $string->chunk(3);

        $this->assertEquals(['宮本 ', '任天堂', ' 茂'], $chunks);
        foreach ($chunks as $chunk) {
            $this->assertInstanceOf(Twine\Str::class, $chunk);
        }
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $chunks = $string->chunk(3);

        foreach ($chunks as $chunk) {
            $this->assertEquals('ASCII', mb_detect_encoding($chunk));
        }
    }
}
