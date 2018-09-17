<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class InsensitiveMatchTest extends TestCase
{
    public function test_it_can_be_insensitively_matched()
    {
        $string = new Twine\Str('john pinkerton');

        $matches = $string->insensitiveMatch('JoHN PiNKeRToN');
        $differs = $string->insensitiveMatch('BoB BeLCHeR');

        $this->assertTrue($matches);
        $this->assertFalse($differs);
    }

    public function test_a_multibyte_string_can_be_insensitively_matched()
    {
        $string = new Twine\Str('宮本 茂');

        $matches = $string->insensitiveMatch('宮本 茂');
        $differs = $string->insensitiveMatch('任天堂');

        $this->assertTrue($matches);
        $this->assertFalse($differs);
    }
}
