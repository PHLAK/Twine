<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class StartsWithTest extends TestCase
{
    #[Test]
    public function it_can_determine_if_it_starts_with_a_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue($string->startsWith('john'));
        $this->assertFalse($string->startsWith('pinkerton'));
    }

    #[Test]
    public function it_can_determine_if_a_multibyte_string_starts_with_a_multibyte_string(): void
    {
        $string = new Twine\Str('宮本 茂');

        $this->assertTrue($string->startsWith('宮本'));
        $this->assertFalse($string->startsWith('茂'));
    }

    #[Test]
    public function it_should_return_false_with_passing_empty_string_to_constructor(): void
    {
        $string = new Twine\Str('');

        $this->assertFalse($string->startsWith('john pinkerton'));
    }

    #[Test]
    public function it_should_return_false_with_passing_empty_string_to_method(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertFalse($string->startsWith(''));
    }
}
