<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class EchoTest extends TestCase
{
    public function test_it_can_be_echoed()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectOutputString('john pinkerton');

        $return = $string->echo();

        $this->assertInstanceOf(Twine\Str::class, $return);
    }

    public function test_a_multibyte_string_can_be_echoed()
    {
        $string = new Twine\Str('宮本 茂');

        $this->expectOutputString('宮本 茂');

        $return = $string->echo();

        $this->assertInstanceOf(Twine\Str::class, $return);
    }
}
