<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class ContainsTest extends TestCase
{
    #[Test]
    public function it_can_determine_if_it_contains_a_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue($string->contains('pink'));
        $this->assertFalse($string->contains('purple'));
    }

    #[Test]
    public function it_can_determine_if_a_multibyte_string_contains_a_multibyte_string(): void
    {
        $string = new Twine\Str('宮本 茂');

        $this->assertTrue($string->contains('宮本'));
        $this->assertFalse($string->contains('任天堂'));
    }
}
