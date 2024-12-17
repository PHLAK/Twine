<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class ReverseTest extends TestCase
{
    #[Test]
    public function it_can_be_reversed(): void
    {
        $string = new Twine\Str('john pinkerton');

        $reversed = $string->reverse();

        $this->assertInstanceOf(Twine\Str::class, $reversed);
        $this->assertEquals('notreknip nhoj', $reversed);
    }

    #[Test]
    public function it_is_multibyte_compatible(): void
    {
        $string = new Twine\Str('宮本 茂');

        $reversed = $string->reverse();

        $this->assertInstanceOf(Twine\Str::class, $reversed);
        $this->assertEquals('茂 本宮', $reversed);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $reversed = $string->reverse();

        $this->assertEquals('ASCII', mb_detect_encoding($reversed));
    }
}
