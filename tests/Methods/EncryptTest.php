<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\EncryptionException;
use PHPUnit\Framework\TestCase;

class EncryptTest extends TestCase
{
    public function test_it_can_be_encrypted()
    {
        $string = new Twine\Str('john pinkerton');

        $encrypted = $string->encrypt('secret');

        $this->assertInstanceOf(Twine\Str::class, $encrypted);
        $this->assertRegExp('/[a-zA-Z0-9=+\/]+/', (string) $encrypted);

        return $encrypted;
    }

    public function test_it_throws_an_exception_when_encrypting_with_an_invalid_cipher()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(EncryptionException::class);

        $string->encrypt('secret', 'invalid');
    }

    public function test_a_multibyte_string_can_be_encrypted()
    {
        $string = new Twine\Str('宮本 茂');

        $encrypted = $string->encrypt('secret');

        $this->assertInstanceOf(Twine\Str::class, $encrypted);
        $this->assertRegExp('/[a-zA-Z0-9=+\/]+/', (string) $encrypted);

        return $encrypted;
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $encrypted = $string->encrypt('secret');

        $this->assertEquals('ASCII', mb_detect_encoding($encrypted));
    }
}
