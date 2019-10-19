<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class Sha256Test extends TestCase
{
    public function test_it_can_be_hashed_with_sha256()
    {
        $string = new Twine\Str('john pinkerton');

        $sha256 = $string->sha256();
        $raw = $string->sha256(Twine\Config\Sha256::RAW);

        $this->assertInstanceOf(Twine\Str::class, $sha256);
        $this->assertEquals('7434f26c8c2fc83e57347feb2dfb235c2f47b149b54b80692beca9d565159dfd', $sha256);
        $this->assertEquals(base64_decode('dDQ/bD8vPz5XNH8/LT8jXC9HP0k/Sz9pKz8/ZRU/Pw=='), $raw);
    }

    public function test_a_multibyte_string_can_be_hashed_with_sha256()
    {
        $string = new Twine\Str('宮本 茂');

        $sha256 = $string->sha256();
        $raw = $string->sha256(Twine\Config\Sha256::RAW);

        $this->assertInstanceOf(Twine\Str::class, $sha256);
        $this->assertEquals('23b55193cb08e619247b7e1ba65bfc0f5863f73ee3615e5b0dc7101c80c4302f', $sha256);
        $this->assertEquals(base64_decode('Iz9RPz8IPxkke34bP1s/D1hjPz4/YV5bDT8QHD8/MC8='), $raw);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $sha256 = $string->sha256();

        $this->assertAttributeEquals('ASCII', 'encoding', $sha256);
    }
}
