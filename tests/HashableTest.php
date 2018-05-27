<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class HashableTest extends TestCase
{
    public function test_it_can_calculate_the_crc32_polynomial()
    {
        $string = new Twine\Str('john pinkerton');

        $crc32 = $string->crc32();

        $this->assertEquals(3367853299, $crc32);
    }

    public function test_it_can_be_hashed_with_crypt()
    {
        $string = new Twine\Str('john pinkerton');

        $crypt = $string->crypt('NaCl');

        $this->assertInstanceOf(Twine\Str::class, $crypt);
        $this->assertEquals('Naq9mOMsN7Yac', $crypt);
    }

    public function test_it_can_be_hashed_with_md5()
    {
        $string = new Twine\Str('john pinkerton');

        $md5 = $string->md5();
        $raw = $string->md5(true);

        $this->assertInstanceOf(Twine\Str::class, $md5);
        $this->assertEquals('30cac4703a16a2201ec5cafbd600d803', $md5);
        $this->assertEquals(base64_decode('MMrEcDoWoiAexcr71gDYAw=='), $raw);
    }

    public function test_it_can_be_hashed_with_sha1()
    {
        $string = new Twine\Str('john pinkerton');

        $sha1 = $string->sha1();
        $raw = $string->sha1(true);

        $this->assertInstanceOf(Twine\Str::class, $sha1);
        $this->assertEquals('fcaf28c7705ba8f267472bb5aa8ad883f6bf0427', $sha1);
        $this->assertEquals(base64_decode('/K8ox3BbqPJnRyu1qorYg/a/BCc='), $raw);
    }

    public function test_it_can_be_hashed_with_sha256()
    {
        $string = new Twine\Str('john pinkerton');

        $sha256 = $string->sha256();
        $raw = $string->sha256(true);

        $this->assertInstanceOf(Twine\Str::class, $sha256);
        $this->assertEquals('7434f26c8c2fc83e57347feb2dfb235c2f47b149b54b80692beca9d565159dfd', $sha256);
        $this->assertEquals(base64_decode('dDTybIwvyD5XNH/rLfsjXC9HsUm1S4BpK+yp1WUVnf0='), $raw);
    }
}
