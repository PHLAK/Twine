<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class EncodingTest extends TestCase
{
    public function test_it_can_set_the_internal_encoding()
    {
        $string = new Twine\Str('john pinkerton');

        $ascii = $string->encoding('ASCII');

        $this->assertInstanceOf(Twine\Str::class, $ascii);
        $this->assertEquals('ASCII', mb_detect_encoding($ascii));
    }
}
