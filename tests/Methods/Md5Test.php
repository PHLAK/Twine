<?php

namespace PHLAK\Twine\Tests\Methods;

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
        $this->assertEquals(base64_decode('MD8/cDoWPyAePz8/PwA/Aw=='), $raw);
    }

    public function test_a_multibyte_string_can_be_hashed_with_md5()
    {
        $string = new Twine\Str('宮本 茂');

        $md5 = $string->md5();
        $raw = $string->md5(Twine\Config\Md5::RAW);

        $this->assertInstanceOf(Twine\Str::class, $md5);
        $this->assertEquals('c5d37b31d718f00ddb370839a847f44f', $md5);
        $this->assertEquals(base64_decode('Pz97MT8YPw0/Nwg5P0c/Tw=='), $raw);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $md5 = $string->md5();

        $this->assertEquals('ASCII', mb_detect_encoding($md5));
    }
}
