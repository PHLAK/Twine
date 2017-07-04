<?php

class HashableTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->string = new Twine\Str('john pinkerton');
    }

    public function test_it_can_calculate_the_crc32_polynomial()
    {
        $string = $this->string->crc32();

        $this->assertEquals(3367853299, $string);
    }

    public function test_it_can_be_hashed_with_crypt()
    {
        $string = $this->string->crypt('NaCl');

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('Naq9mOMsN7Yac', $string);
    }

    public function test_it_can_be_hashed_with_md5()
    {
        $string = $this->string->md5();
        $raw = $this->string->md5(true);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('30cac4703a16a2201ec5cafbd600d803', $string);
        $this->assertEquals(base64_decode('MMrEcDoWoiAexcr71gDYAw=='), $raw);
    }

    public function test_it_can_be_hashed_with_sha1()
    {
        $string = $this->string->sha1();
        $raw = $this->string->sha1(true);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('fcaf28c7705ba8f267472bb5aa8ad883f6bf0427', $string);
        $this->assertEquals(base64_decode('/K8ox3BbqPJnRyu1qorYg/a/BCc='), $raw);
    }

    public function test_it_can_be_hashed_with_sha256()
    {
        $string = $this->string->sha256();
        $raw = $this->string->sha256(true);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('7434f26c8c2fc83e57347feb2dfb235c2f47b149b54b80692beca9d565159dfd', $string);
        $this->assertEquals(base64_decode('dDTybIwvyD5XNH/rLfsjXC9HsUm1S4BpK+yp1WUVnf0='), $raw);
    }
}
