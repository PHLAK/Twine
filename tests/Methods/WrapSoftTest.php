<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class WrapSoftTest extends TestCase
{
    #[Test]
    public function it_can_be_soft_wrapped(): void
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedSoft = $string->wrapSoft(5);

        $this->assertInstanceOf(Twine\Str::class, $wrappedSoft);
        $this->assertEquals("john\npinkerton", $wrappedSoft);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $wrappedSoft = $string->wrapSoft(5);

        $this->assertEquals('ASCII', mb_detect_encoding($wrappedSoft));
    }
}
