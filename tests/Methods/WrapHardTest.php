<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class WrapHardTest extends TestCase
{
    #[Test]
    public function it_can_be_hard_wrapped(): void
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedHard = $string->wrapHard(5);

        $this->assertInstanceOf(Twine\Str::class, $wrappedHard);
        $this->assertEquals("john\npinke\nrton", $wrappedHard);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $wrappedHard = $string->wrapHard(5);

        $this->assertEquals('ASCII', mb_detect_encoding($wrappedHard));
    }
}
