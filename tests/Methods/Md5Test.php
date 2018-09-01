<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class Md5Test extends TestCase
{
    public function test_it_can_be_hashed_with_md5()
    {
        $string = new Twine\Str('john pinkerton');

        $md5 = $string->md5();
        $raw = $string->md5(Twine\Config\Md5::RAW);

        $this->assertInstanceOf(Twine\Str::class, $md5);
        $this->assertEquals('30cac4703a16a2201ec5cafbd600d803', $md5);
        $this->assertEquals(base64_decode('MMrEcDoWoiAexcr71gDYAw=='), $raw);
    }

    public function test_a_multibyte_string_can_be_hashed_with_md5()
    {
        $string = new Twine\Str('宮本 茂');

        $md5 = $string->md5();
        $raw = $string->md5(Twine\Config\Md5::RAW);

        $this->assertInstanceOf(Twine\Str::class, $md5);
        $this->assertEquals('c5d37b31d718f00ddb370839a847f44f', $md5);
        $this->assertEquals(base64_decode('xdN7MdcY8A3bNwg5qEf0Tw=='), $raw);
    }
}
