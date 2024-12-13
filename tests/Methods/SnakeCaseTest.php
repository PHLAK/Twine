<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class SnakeCaseTest extends TestCase
{
    #[Test]
    public function it_can_convert_to_snake_case(): void
    {
        $string = new Twine\Str('john pinkerton');

        $snakeCase = $string->snakeCase();

        $this->assertInstanceOf(Twine\Str::class, $snakeCase);
        $this->assertEquals('john_pinkerton', $snakeCase);
    }

    #[Test]
    public function it_a_multibyte_string_can_be_converted_to_snake_case(): void
    {
        $string = new Twine\Str('джон пинкертон');

        $snakeCase = $string->snakeCase();

        $this->assertInstanceOf(Twine\Str::class, $snakeCase);
        $this->assertEquals('джон_пинкертон', $snakeCase);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $snakeCase = $string->snakeCase();

        $this->assertEquals('ASCII', mb_detect_encoding($snakeCase));
    }
}
