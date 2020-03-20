<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class EchoTest extends TestCase
{
    public function test_it_can_be_echoed()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectOutputString('john pinkerton');

        $echoed = $string->echo();

        $this->assertInstanceOf(Twine\Str::class, $echoed);
        $this->assertEquals('john pinkerton', $echoed);
    }

    public function test_a_multibyte_string_can_be_echoed()
    {
        $string = new Twine\Str('宮本 茂');

        $this->expectOutputString('宮本 茂');

        $echoed = $string->echo();

        $this->assertInstanceOf(Twine\Str::class, $echoed);
        $this->assertEquals('宮本 茂', $echoed);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $this->expectOutputString('john pinkerton');

        $echoed = $string->echo();

        $this->assertEquals('ASCII', mb_detect_encoding($echoed));
    }
}
