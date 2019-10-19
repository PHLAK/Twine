<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\DecryptionException;
use PHPUnit\Framework\TestCase;

class DecryptTest extends TestCase
{
    /** @var string An encrypted string */
    protected $encryptedString = 'eyJpdiI6IjR1a3dRdVk1Q0ZmeXYyekRiN0pucVE9PSIsImNpcGhlcnRleHQiOiJRRGRwUUhvcWpKSjZiQ3gyK3dEUEpBPT0iLCJobWFjIjoiNWJlMGZmZGQxNmQ4NDA3MmU1NTA2MTYwMzFjN2FlOTZiZWQ0OWVkMDc5NGVkYzc1ZDFmOWM3N2FkZjE0ZmQzOCJ9';

    /** @var string An encrypted multibyte string */
    protected $encryptedMultibyteString = 'eyJpdiI6IlpmREU5RjBLY3BYWTdqQ3hHelM3bFE9PSIsImNpcGhlcnRleHQiOiJGbEdvR3VGZUI1eUJmN1hhaXJINlpRPT0iLCJobWFjIjoiZDVjZDllNDQ4YTYzMmM5NDVjMDYxZDdlZTZlYmY0OGZlMmNhNWZlYzM1MDZhM2Q5NTZkYjM0ZmU4MDQ0YjAzNSJ9';

    public function test_it_can_be_decrypted()
    {
        $string = new Twine\Str($this->encryptedString);

        $decrypted = $string->decrypt('secret');

        $this->assertInstanceOf(Twine\Str::class, $decrypted);
        $this->assertEquals('john pinkerton', $decrypted);
    }

    public function test_it_throws_an_exception_when_decrypting_an_invalid_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(DecryptionException::class);

        $string->decrypt('secret');
    }

    public function test_it_throws_an_exception_when_decryption_fails()
    {
        $string = new Twine\Str($this->encryptedString);

        $this->expectException(DecryptionException::class);

        $string->decrypt('shmecret');
    }

    public function test_a_multibyte_string_can_be_decrypted()
    {
        $string = new Twine\Str($this->encryptedMultibyteString);

        $decrypted = $string->decrypt('任天堂');

        $this->assertInstanceOf(Twine\Str::class, $decrypted);
        $this->assertEquals('宮本 茂', $decrypted);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str($this->encryptedString, 'ASCII');

        $decrypted = $string->decrypt('secret');

        $this->assertAttributeEquals('ASCII', 'encoding', $decrypted);
    }
}
