<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function test_it_can_be_url_encoded()
    {
        $string = new Twine\Str('john+pinkerton/john=pinkerton');

        $urlencoded = $string->url();

        $this->assertInstanceOf(Twine\Str::class, $urlencoded);
        $this->assertEquals('john%2Bpinkerton%2Fjohn%3Dpinkerton', $urlencoded);

        return $urlencoded;
    }

    /** @depends test_it_can_be_url_encoded */
    public function test_it_can_be_url_decoded(Twine\Str $urlencodedString)
    {
        $urldecoded = $urlencodedString->url(Twine\Config\Url::DECODE);

        $this->assertInstanceOf(Twine\Str::class, $urldecoded);
        $this->assertEquals('john+pinkerton/john=pinkerton', $urldecoded);
    }

    public function test_a_multibyte_string_can_be_url_encoded()
    {
        $string = new Twine\Str('宮本+茂/任天堂');

        $urlencoded = $string->url();

        $this->assertInstanceOf(Twine\Str::class, $urlencoded);
        $this->assertEquals('%E5%AE%AE%E6%9C%AC%2B%E8%8C%82%2F%E4%BB%BB%E5%A4%A9%E5%A0%82', $urlencoded);

        return $urlencoded;
    }

    /** @depends test_a_multibyte_string_can_be_url_encoded */
    public function test_a_multibyte_string_can_be_url_decoded(Twine\Str $urlencodedString)
    {
        $urldecoded = $urlencodedString->url(Twine\Config\Url::DECODE);

        $this->assertInstanceOf(Twine\Str::class, $urldecoded);
        $this->assertEquals('宮本+茂/任天堂', $urldecoded);
    }
}
