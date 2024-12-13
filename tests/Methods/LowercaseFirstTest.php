<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class LowercaseFirstTest extends TestCase
{
    #[Test]
    public function it_can_lowercase_the_first_letter_only(): void
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcFirst = $string->lowercaseFirst();

        $this->assertInstanceOf(Twine\Str::class, $lcFirst);
        $this->assertEquals('jOHN PINKERTON', $lcFirst);
    }

    #[Test]
    public function it_can_lowercase_the_first_letter_of_a_multibyte_string(): void
    {
        $first = new Twine\Str('ДЖОН ПИНКЕРТОН');

        $lowercasedFirst = $first->lowercaseFirst();

        $this->assertInstanceOf(Twine\Str::class, $lowercasedFirst);
        $this->assertEquals('дЖОН ПИНКЕРТОН', $lowercasedFirst);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('JOHN PINKERTON', 'ASCII');

        $lowercasedFirst = $string->lowercaseFirst();

        $this->assertEquals('ASCII', mb_detect_encoding($lowercasedFirst));
    }
}
