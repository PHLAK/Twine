<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class SplitTest extends TestCase
{
    public function test_it_can_be_split()
    {
        $string = new Twine\Str('john pinkerton');

        $chunks = $string->split(3);

        $this->assertEquals(['john ', 'pinke', 'rton'], $chunks);
        foreach ($chunks as $chunk) {
            $this->assertInstanceOf(Twine\Str::class, $chunk);
        }
    }

    public function test_a_multibyte_string_can_be_split()
    {
        $string = new Twine\Str('宮本 任天堂 茂');

        $chunks = $string->split(3);

        $this->assertEquals(['宮本 ', '任天堂', ' 茂'], $chunks);
        foreach ($chunks as $chunk) {
            $this->assertInstanceOf(Twine\Str::class, $chunk);
        }
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $chunks = $string->split(3);

        foreach ($chunks as $chunk) {
            $this->assertEquals('ASCII', mb_detect_encoding($chunk));
        }
    }
}
