<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class PascalCaseTest extends TestCase
{
    #[Test]
    public function it_can_convert_to_pascal_case(): void
    {
        $string = new Twine\Str('john pinkerton');

        $pascalCase = $string->pascalCase();

        $this->assertInstanceOf(Twine\Str::class, $pascalCase);
        $this->assertEquals('JohnPinkerton', $pascalCase);
    }

    #[Test]
    public function it_a_multibyte_string_can_be_converted_to_pascal_case(): void
    {
        $string = new Twine\Str('джон пинкертон');

        $pascalCase = $string->pascalCase();

        $this->assertInstanceOf(Twine\Str::class, $pascalCase);
        $this->assertEquals('ДжонПинкертон', $pascalCase);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $pascalCase = $string->pascalCase();

        $this->assertEquals('ASCII', mb_detect_encoding($pascalCase));
    }
}
