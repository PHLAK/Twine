<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class CamelCaseTest extends TestCase
{
    #[Test]
    public function it_can_be_converted_to_camel_case(): void
    {
        $string = new Twine\Str('john pinkerton');

        $camelCase = $string->camelCase();

        $this->assertInstanceOf(Twine\Str::class, $camelCase);
        $this->assertEquals('johnPinkerton', $camelCase);
    }

    #[Test]
    public function it_a_multibyte_string_can_be_converted_to_camel_case(): void
    {
        $string = new Twine\Str('джон пинкертон');

        $camelCase = $string->camelCase();

        $this->assertInstanceOf(Twine\Str::class, $camelCase);
        $this->assertEquals('джонПинкертон', $camelCase);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $camelCase = $string->camelCase();

        $this->assertEquals('ASCII', mb_detect_encoding($camelCase));
    }
}
