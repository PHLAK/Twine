<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class PrependTest extends TestCase
{
    #[Test]
    public function it_can_be_prepended(): void
    {
        $string = new Twine\Str('john pinkerton');

        $prepended = $string->prepend('mr ');

        $this->assertInstanceOf(Twine\Str::class, $prepended);
        $this->assertEquals('mr john pinkerton', $prepended);
    }

    #[Test]
    public function it_can_be_prepended_with_multiple_strings(): void
    {
        $first = new Twine\Str('john');
        $last = new Twine\Str('pinkerton');

        $prepended = $last->prepend($first, ' ');

        $this->assertInstanceOf(Twine\Str::class, $prepended);
        $this->assertEquals('john pinkerton', $prepended);
    }

    #[Test]
    public function it_is_multibyte_compatible(): void
    {
        $first = new Twine\Str('茂');

        $prepended = $first->prepend('宮本 ');

        $this->assertInstanceOf(Twine\Str::class, $prepended);
        $this->assertEquals('宮本 茂', $prepended);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $prepended = $string->prepend('mr ');

        $this->assertEquals('ASCII', mb_detect_encoding($prepended));
    }
}
