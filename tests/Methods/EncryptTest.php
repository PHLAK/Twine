<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\EncryptionException;
use PHLAK\Twine\Str;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class EncryptTest extends TestCase
{
    #[Test]
    public function it_can_be_encrypted(): Str
    {
        $string = new Twine\Str('john pinkerton');

        $encrypted = $string->encrypt('secret');

        $this->assertInstanceOf(Twine\Str::class, $encrypted);
        $this->assertMatchesRegularExpression('/[a-zA-Z0-9=+\/]+/', (string) $encrypted);

        return $encrypted;
    }

    #[Test]
    public function it_throws_an_exception_when_encrypting_with_an_invalid_cipher(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(EncryptionException::class);

        $string->encrypt('secret', 'invalid');
    }

    public function a_multibyte_string_can_be_encrypted(): Str
    {
        $string = new Twine\Str('宮本 茂');

        $encrypted = $string->encrypt('secret');

        $this->assertInstanceOf(Twine\Str::class, $encrypted);
        $this->assertMatchesRegularExpression('/[a-zA-Z0-9=+\/]+/', (string) $encrypted);

        return $encrypted;
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $encrypted = $string->encrypt('secret');

        $this->assertEquals('ASCII', mb_detect_encoding($encrypted));
    }
}
