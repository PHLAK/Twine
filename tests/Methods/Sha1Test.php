<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class Sha1Test extends TestCase
{
    #[Test]
    public function it_can_be_hashed_with_sha1(): void
    {
        $string = new Twine\Str('john pinkerton');

        $sha1 = $string->sha1();
        $raw = $string->sha1(Twine\Config\Sha1::RAW);

        $this->assertInstanceOf(Twine\Str::class, $sha1);
        $this->assertEquals('fcaf28c7705ba8f267472bb5aa8ad883f6bf0427', $sha1);
        $this->assertEquals(base64_decode('Pz8oP3BbPz9nRys/Pz/Ygz8/BCc='), $raw);
    }

    public function a_multibyte_string_can_be_hashed_with_sha1(): void
    {
        $string = new Twine\Str('宮本 茂');

        $sha1 = $string->sha1();
        $raw = $string->sha1(Twine\Config\Sha1::RAW);

        $this->assertInstanceOf(Twine\Str::class, $sha1);
        $this->assertEquals('606d67644969b213dbd54696de4b428caa4acb1f', $sha1);
        $this->assertEquals(base64_decode('YG1nZElpPxM/P0Y/P0tCPz9KPx8='), $raw);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $sha1 = $string->sha1();

        $this->assertEquals('ASCII', mb_detect_encoding($sha1));
    }
}
