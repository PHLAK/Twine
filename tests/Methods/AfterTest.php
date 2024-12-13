<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class AfterTest extends TestCase
{
    #[Test]
    public function it_can_get_part_of_a_string_after_a_character(): void
    {
        $string = new Twine\Str('john pinkerton');

        $lastName = $string->after(' ');

        $this->assertInstanceOf(Twine\Str::class, $lastName);
        $this->assertEquals('pinkerton', $lastName);
    }

    #[Test]
    public function it_can_get_part_of_a_string_after_a_character_with_multiple_delimiters(): void
    {
        $string = new Twine\Str('john pinkerton jr');

        $lastNameAndSuffix = $string->after(' ');

        $this->assertInstanceOf(Twine\Str::class, $lastNameAndSuffix);
        $this->assertEquals('pinkerton jr', $lastNameAndSuffix);
    }

    #[Test]
    public function it_can_get_part_of_a_multibyte_string_after_a_multibyte_string(): void
    {
        $string = new Twine\Str('宮本 茂');

        $after = $string->after('本');

        $this->assertInstanceOf(Twine\Str::class, $after);
        $this->assertEquals(' 茂', $after);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $lastName = $string->after(' ');

        $this->assertEquals('ASCII', mb_detect_encoding($lastName));
    }
}
