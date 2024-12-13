<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class IsAlphanumericTest extends TestCase
{
    #[Test]
    public function it_can_determine_if_the_string_is_alphanumeric(): void
    {
        $string = new Twine\Str('JohnPinkerton123');

        $alphanumeric = $string->isAlphanumeric();

        $this->assertTrue($alphanumeric);
    }

    #[Test]
    public function it_can_determine_if_the_string_is_not_alphanumeric(): void
    {
        $string = new Twine\Str('john pinkerton');

        $notAlphanumeric = $string->isAlphanumeric();

        $this->assertFalse($notAlphanumeric);
    }

    #[Test]
    public function it_can_determine_if_a_multibyte_string_is_alphanumeric(): void
    {
        $string = new Twine\Str('任天堂');

        $alphanumeric = $string->isAlphanumeric();

        $this->assertFalse($alphanumeric);
    }
}
