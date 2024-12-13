<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class StudlyCaseTest extends TestCase
{
    #[Test]
    public function it_can_convert_to_studly_case(): void
    {
        $string = new Twine\Str('john pinkerton');

        $studlyCase = $string->studlyCase();

        $this->assertInstanceOf(Twine\Str::class, $studlyCase);
        $this->assertEquals('JohnPinkerton', $studlyCase);
    }

    #[Test]
    public function it_a_multibyte_string_can_be_converted_to_studly_case(): void
    {
        $string = new Twine\Str('джон пинкертон');

        $studlyCase = $string->studlyCase();

        $this->assertInstanceOf(Twine\Str::class, $studlyCase);
        $this->assertEquals('ДжонПинкертон', $studlyCase);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $studlyCase = $string->studlyCase();

        $this->assertEquals('ASCII', mb_detect_encoding($studlyCase));
    }
}
