<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class ToTest extends TestCase
{
    #[Test]
    public function it_can_get_part_of_a_string_ending_with_another_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $to = $string->to('pink');

        $this->assertInstanceOf(Twine\Str::class, $to);
        $this->assertEquals('john pink', $to);
    }

    #[Test]
    public function it_returns_an_empty_string_when_getting_part_of_a_string_ending_with_a_non_existent_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $to = $string->to('purple');

        $this->assertInstanceOf(Twine\Str::class, $to);
        $this->assertEquals('', $to);
    }

    #[Test]
    public function it_can_get_part_of_a_multibyte_string_ending_with_another_string(): void
    {
        $string = new Twine\Str('宮本 茂');

        $to = $string->to('本');

        $this->assertInstanceOf(Twine\Str::class, $to);
        $this->assertEquals('宮本', $to);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $to = $string->to('pink');

        $this->assertEquals('ASCII', mb_detect_encoding($to));
    }
}
