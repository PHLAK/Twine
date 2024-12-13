<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class StripTest extends TestCase
{
    #[Test]
    public function it_can_be_stripped(): void
    {
        $string = new Twine\Str('john pinkerton');

        $striped = $string->strip('pink');

        $this->assertInstanceOf(Twine\Str::class, $striped);
        $this->assertEquals('john erton', $striped);
    }

    #[Test]
    public function it_can_strip_multiple_strings_from_the_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $striped = $string->strip(['a', 'e', 'i', 'o', 'u']);

        $this->assertInstanceOf(Twine\Str::class, $striped);
        $this->assertEquals('jhn pnkrtn', $striped);
    }

    #[Test]
    public function it_is_multibyte_compatible(): void
    {
        $string = new Twine\Str('宮本 茂');

        $stripped = $string->strip('本');

        $this->assertInstanceOf(Twine\Str::class, $stripped);
        $this->assertEquals('宮 茂', $stripped);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $stripped = $string->strip('pink');

        $this->assertEquals('ASCII', mb_detect_encoding($stripped));
    }
}
