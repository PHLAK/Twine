<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class BeforeTest extends TestCase
{
    #[Test]
    public function it_can_get_part_of_a_string_before_a_character(): void
    {
        $string = new Twine\Str('john pinkerton');

        $firstName = $string->before(' ');

        $this->assertInstanceOf(Twine\Str::class, $firstName);
        $this->assertEquals('john', $firstName);
    }

    #[Test]
    public function it_can_get_part_of_a_string_before_a_character_with_multiple_delimiters(): void
    {
        $string = new Twine\Str('john pinkerton jr');

        $firstName = $string->before(' ');

        $this->assertInstanceOf(Twine\Str::class, $firstName);
        $this->assertEquals('john', $firstName);
    }

    #[Test]
    public function it_can_get_part_of_a_multibyte_string_before_a_multibyte_string(): void
    {
        $string = new Twine\Str('宮本 茂');

        $firstName = $string->before('本');

        $this->assertInstanceOf(Twine\Str::class, $firstName);
        $this->assertEquals('宮', $firstName);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $firstName = $string->before(' ');

        $this->assertEquals('ASCII', mb_detect_encoding($firstName));
    }
}
