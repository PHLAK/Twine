<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class IsNumericTest extends TestCase
{
    #[Test]
    public function it_can_determine_if_the_string_is_numeric(): void
    {
        $string = new Twine\Str('1337');

        $numeric = $string->isNumeric();

        $this->assertTrue($numeric);
    }

    #[Test]
    public function it_can_determine_if_the_string_is_not_numeric(): void
    {
        $string = new Twine\Str('john pinkerton');

        $notNumeric = $string->isNumeric();

        $this->assertFalse($notNumeric);
    }

    #[Test]
    public function it_can_determine_if_a_multibyte_string_is_numeric(): void
    {
        $string = new Twine\Str('任天堂');

        $numeric = $string->isNumeric();

        $this->assertFalse($numeric);
    }
}
