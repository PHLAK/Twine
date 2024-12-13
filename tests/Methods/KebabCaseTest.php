<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class KebabCaseTest extends TestCase
{
    #[Test]
    public function it_can_convert_to_kebab_case(): void
    {
        $string = new Twine\Str('john pinkerton');

        $kebabCase = $string->kebabCase();

        $this->assertInstanceOf(Twine\Str::class, $kebabCase);
        $this->assertEquals('john-pinkerton', $kebabCase);
    }

    #[Test]
    public function it_a_multibyte_string_can_be_converted_to_kebab_case(): void
    {
        $string = new Twine\Str('джон пинкертон');

        $kebabCase = $string->kebabCase();

        $this->assertInstanceOf(Twine\Str::class, $kebabCase);
        $this->assertEquals('джон-пинкертон', $kebabCase);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $kebabCase = $string->kebabCase();

        $this->assertEquals('ASCII', mb_detect_encoding($kebabCase));
    }
}
