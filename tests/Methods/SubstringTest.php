<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class SubstringTest extends TestCase
{
    #[Test]
    public function it_can_return_a_substring(): void
    {
        $string = new Twine\Str('john pinkerton');

        $substring = $string->substring(5);
        $partial = $string->substring(5, 4);

        $this->assertInstanceOf(Twine\Str::class, $substring);
        $this->assertEquals('pinkerton', $substring);
        $this->assertEquals('pink', $partial);
    }

    #[Test]
    public function it_can_return_a_multibyte_substring(): void
    {
        $string = new Twine\Str('宮本 茂');

        $substring = $string->substring(1);
        $partial = $string->substring(1, 2);

        $this->assertInstanceOf(Twine\Str::class, $substring);
        $this->assertEquals('本 茂', $substring);
        $this->assertEquals('本 ', $partial);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $substring = $string->substring(5, 4);

        $this->assertEquals('ASCII', mb_detect_encoding($substring));
    }
}
