<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class TrimLeftTest extends TestCase
{
    public function test_it_can_be_left_trimmed()
    {
        $string = new Twine\Str('john pinkerton');

        $leftTrimmed = $string->trimLeft('jton');

        $this->assertInstanceOf(Twine\Str::class, $leftTrimmed);
        $this->assertEquals('hn pinkerton', $leftTrimmed);
    }

    public function test_a_multibyte_string_can_be_left_trimmed()
    {
        $string = new Twine\Str('宮本 茂');

        $leftTrimmed = $string->trimLeft('宮');

        $this->assertInstanceOf(Twine\Str::class, $leftTrimmed);
        $this->assertEquals('本 茂', $leftTrimmed);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $leftTrimmed = $string->trimLeft('jton');

        $this->assertEquals('ASCII', mb_detect_encoding($leftTrimmed));
    }
}
