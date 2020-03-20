<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class CryptTest extends TestCase
{
    public function test_it_can_be_hashed_with_crypt()
    {
        $string = new Twine\Str('john pinkerton');

        $crypt = $string->crypt('NaCl');

        $this->assertInstanceOf(Twine\Str::class, $crypt);
        $this->assertEquals('Naq9mOMsN7Yac', $crypt);
    }

    public function test_a_multibyte_string_can_be_hashed_with_crypt()
    {
        $string = new Twine\Str('宮本 茂');

        $crypt = $string->crypt('NaCl');

        $this->assertInstanceOf(Twine\Str::class, $crypt);
        $this->assertEquals('NaJqmdk5MYCgs', $crypt);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $crypt = $string->crypt('NaCL');

        $this->assertEquals('ASCII', mb_detect_encoding($crypt));
    }
}
