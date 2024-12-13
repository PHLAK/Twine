<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class IsAlphabeticTest extends TestCase
{
    #[Test]
    public function it_can_determine_if_the_string_is_alphabetic(): void
    {
        $string = new Twine\Str('JohnPinkerton');

        $alphabetic = $string->isAlphabetic();

        $this->assertTrue($alphabetic);
    }

    #[Test]
    public function it_can_determine_if_the_string_is_not_alphabetic(): void
    {
        $string = new Twine\Str('john pinkerton');

        $notAlphabetic = $string->isAlphabetic();

        $this->assertFalse($notAlphabetic);
    }

    #[Test]
    public function it_can_determine_if_a_multibyte_string_is_alphabetic(): void
    {
        $string = new Twine\Str('任天堂');

        $alphabetic = $string->isAlphabetic();

        $this->assertFalse($alphabetic);
    }
}
