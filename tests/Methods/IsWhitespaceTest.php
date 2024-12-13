<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class IsWhitespaceTest extends TestCase
{
    #[Test]
    public function it_can_determine_if_the_string_is_whitespace(): void
    {
        $string = new Twine\Str(" \r\n\t");

        $whitespace = $string->isWhitespace();

        $this->assertTrue($whitespace);
    }

    #[Test]
    public function it_can_determine_if_the_string_is_not_whitespace(): void
    {
        $string = new Twine\Str('john pinkerton');

        $notWhitespace = $string->isWhitespace();

        $this->assertFalse($notWhitespace);
    }

    #[Test]
    public function it_can_determine_if_a_multibyte_string_is_whitespace(): void
    {
        $string = new Twine\Str('任天堂');

        $whitespace = $string->isWhitespace();

        $this->assertFalse($whitespace);
    }
}
