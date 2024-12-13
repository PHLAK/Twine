<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class FromTest extends TestCase
{
    #[Test]
    public function it_can_get_part_of_a_string_starting_from_another_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $from = $string->from('pink');

        $this->assertInstanceOf(Twine\Str::class, $from);
        $this->assertEquals('pinkerton', $from);
    }

    #[Test]
    public function it_returns_an_empty_string_when_getting_part_of_a_string_from_a_non_existent_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $from = $string->from('purple');

        $this->assertInstanceOf(Twine\Str::class, $from);
        $this->assertEquals('', $from);
    }

    #[Test]
    public function it_can_get_part_of_a_multibyte_string_starting_from_another_string(): void
    {
        $string = new Twine\Str('宮本 茂');

        $from = $string->from('本');

        $this->assertInstanceOf(Twine\Str::class, $from);
        $this->assertEquals('本 茂', $from);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $from = $string->from('pink');

        $this->assertEquals('ASCII', mb_detect_encoding($from));
    }
}
