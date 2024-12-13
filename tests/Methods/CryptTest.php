<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class CryptTest extends TestCase
{
    #[Test]
    public function it_can_be_hashed_with_crypt(): void
    {
        $string = new Twine\Str('john pinkerton');

        $crypt = $string->crypt('NaCl');

        $this->assertInstanceOf(Twine\Str::class, $crypt);
        $this->assertEquals('Naq9mOMsN7Yac', $crypt);
    }

    public function a_multibyte_string_can_be_hashed_with_crypt(): void
    {
        $string = new Twine\Str('宮本 茂');

        $crypt = $string->crypt('NaCl');

        $this->assertInstanceOf(Twine\Str::class, $crypt);
        $this->assertEquals('NaJqmdk5MYCgs', $crypt);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $crypt = $string->crypt('NaCL');

        $this->assertEquals('ASCII', mb_detect_encoding($crypt));
    }
}
