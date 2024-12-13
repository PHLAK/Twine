<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class IsPrintableTest extends TestCase
{
    #[Test]
    public function it_can_determine_if_the_string_is_printable(): void
    {
        $string = new Twine\Str('john pinkerton');

        $printable = $string->isPrintable();

        $this->assertTrue($printable);
    }

    #[Test]
    public function it_can_determine_if_the_string_is_not_printable(): void
    {
        $string = new Twine\Str("john\npinkerton");

        $notPrintable = $string->isPrintable();

        $this->assertFalse($notPrintable);
    }

    #[Test]
    public function it_can_determine_if_a_multibyte_string_is_printable(): void
    {
        $string = new Twine\Str('任天堂');

        $printable = $string->isPrintable();

        $this->assertFalse($printable);
    }
}
