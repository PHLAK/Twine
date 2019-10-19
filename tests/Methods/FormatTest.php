<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class FormatTest extends TestCase
{
    public function test_it_can_be_formatted()
    {
        $string = new Twine\Str('Hello %s! Welcome to %s, population %b.');

        $formatted = $string->format('John', 'Pinkertown', 1337);

        $this->assertInstanceOf(Twine\Str::class, $formatted);
        $this->assertEquals('Hello John! Welcome to Pinkertown, population 10100111001.', $formatted);
    }

    public function test_a_multibyte_string_can_be_formatted()
    {
        $string = new Twine\Str('こんにちは, %s! ようこそ %s.');

        $formatted = $string->format('宮本 茂', '任天堂');

        $this->assertInstanceOf(Twine\Str::class, $formatted);
        $this->assertEquals('こんにちは, 宮本 茂! ようこそ 任天堂.', $formatted);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('Hello %s! Welcome to %s, population %b.', 'ASCII');

        $formatted = $string->format('John', 'Pinkertown', 1337);

        $this->assertAttributeEquals('ASCII', 'encoding', $formatted);
    }
}
