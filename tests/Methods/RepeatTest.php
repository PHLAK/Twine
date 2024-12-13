<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class RepeatTest extends TestCase
{
    #[Test]
    public function it_can_be_repeated(): void
    {
        $string = new Twine\Str('john pinkerton');

        $repeated = $string->repeat(2);

        $this->assertInstanceOf(Twine\Str::class, $repeated);
        $this->assertEquals('john pinkertonjohn pinkerton', $repeated);
    }

    #[Test]
    public function it_can_be_repeated_with_glue(): void
    {
        $string = new Twine\Str('beetlejuice');

        $repeated = $string->repeat(3, ' ');

        $this->assertInstanceOf(Twine\Str::class, $repeated);
        $this->assertEquals('beetlejuice beetlejuice beetlejuice', $repeated);
    }

    #[Test]
    public function it_is_multibyte_compatible(): void
    {
        $string = new Twine\Str('宮本');

        $repeated = $string->repeat(3, ' 茂 ');

        $this->assertInstanceOf(Twine\Str::class, $repeated);
        $this->assertEquals('宮本 茂 宮本 茂 宮本', $repeated);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $repeated = $string->repeat(2);

        $this->assertEquals('ASCII', mb_detect_encoding($repeated));
    }
}
