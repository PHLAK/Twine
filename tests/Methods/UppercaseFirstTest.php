<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class UppercaseFirstTest extends TestCase
{
    #[Test]
    public function it_can_uppercase_the_first_letter_only(): void
    {
        $string = new Twine\Str('john pinkerton');

        $ucFirst = $string->uppercaseFirst();

        $this->assertInstanceOf(Twine\Str::class, $ucFirst);
        $this->assertEquals('John pinkerton', $ucFirst);
    }

    #[Test]
    public function it_can_uppercase_the_first_letter_of_a_multibyte_string(): void
    {
        $string = new Twine\Str('джон пинкертон');

        $uppercasedFirst = $string->uppercaseFirst();

        $this->assertInstanceOf(Twine\Str::class, $uppercasedFirst);
        $this->assertEquals('Джон пинкертон', $uppercasedFirst);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $uppercasedFirst = $string->uppercaseFirst();

        $this->assertEquals('ASCII', mb_detect_encoding($uppercasedFirst));
    }
}
