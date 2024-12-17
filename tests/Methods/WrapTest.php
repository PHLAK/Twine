<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class WrapTest extends TestCase
{
    #[Test]
    public function it_can_be_wrapped(): void
    {
        $string = new Twine\Str('john pinkerton');

        $wrapped = $string->wrap(5);

        $this->assertInstanceOf(Twine\Str::class, $wrapped);
        $this->assertEquals("john\npinkerton", $wrapped);
    }

    #[Test]
    public function it_can_be_soft_wrapped(): void
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedSoft = $string->wrap(5, "\n", Twine\Config\Wrap::SOFT);

        $this->assertInstanceOf(Twine\Str::class, $wrappedSoft);
        $this->assertEquals("john\npinkerton", $wrappedSoft);
    }

    #[Test]
    public function it_can_be_hard_wrapped(): void
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedHard = $string->wrap(5, "\n", Twine\Config\Wrap::HARD);

        $this->assertInstanceOf(Twine\Str::class, $wrappedHard);
        $this->assertEquals("john\npinke\nrton", $wrappedHard);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $wrapped = $string->wrap(5);

        $this->assertEquals('ASCII', mb_detect_encoding($wrapped));
    }
}
