<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class BcryptTest extends TestCase
{
    #[Test]
    public function it_can_be_hashed_with_bcrypt(): void
    {
        $string = new Twine\Str('john pinkerton');

        $bcrypt = $string->bcrypt(['cost' => 12]);

        $this->assertInstanceOf(Twine\Str::class, $bcrypt);
        $this->assertMatchesRegularExpression('/\$2y\$12\$[a-zA-Z0-9+.\/]{53}/', (string) $bcrypt);
    }

    #[Test]
    public function a_multibyte_string_can_be_hashed_with_bcrypt(): void
    {
        $string = new Twine\Str('宮本 茂');

        $bcrypt = $string->bcrypt(['cost' => 12]);

        $this->assertInstanceOf(Twine\Str::class, $bcrypt);
        $this->assertMatchesRegularExpression('/\$2y\$12\$[a-zA-Z0-9+.\/]{53}/', (string) $bcrypt);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $bcrypt = $string->bcrypt();

        $this->assertEquals('ASCII', mb_detect_encoding($bcrypt));
    }
}
