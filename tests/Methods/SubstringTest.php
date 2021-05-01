<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class SubstringTest extends TestCase
{
    public function test_it_can_return_a_substring()
    {
        $string = new Twine\Str('john pinkerton');

        $substring = $string->substring(5);
        $partial = $string->substring(5, 4);

        $this->assertInstanceOf(Twine\Str::class, $substring);
        $this->assertEquals('pinkerton', $substring);
        $this->assertEquals('pink', $partial);
    }

    public function test_it_can_return_a_multibyte_substring()
    {
        $string = new Twine\Str('宮本 茂');

        $substring = $string->substring(1);
        $partial = $string->substring(1, 2);

        $this->assertInstanceOf(Twine\Str::class, $substring);
        $this->assertEquals('本 茂', $substring);
        $this->assertEquals('本 ', $partial);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $substring = $string->substring(5, 4);

        $this->assertEquals('ASCII', mb_detect_encoding($substring));
    }
}
