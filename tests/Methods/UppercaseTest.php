<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class UppercaseTest extends TestCase
{
    #[Test]
    public function it_can_be_uppercased(): void
    {
        $string = new Twine\Str('john pinkerton');

        $uppercased = $string->uppercase();

        $this->assertInstanceOf(Twine\Str::class, $uppercased);
        $this->assertEquals('JOHN PINKERTON', $uppercased);
    }

    #[Test]
    public function it_can_uppercase_the_first_letter_only(): void
    {
        $string = new Twine\Str('john pinkerton');

        $ucFirst = $string->uppercase(Twine\Config\Uppercase::FIRST);

        $this->assertInstanceOf(Twine\Str::class, $ucFirst);
        $this->assertEquals('John pinkerton', $ucFirst);
    }

    #[Test]
    public function it_can_uppercase_the_first_letter_of_each_word(): void
    {
        $string = new Twine\Str('john pinkerton');

        $ucWords = $string->uppercase(Twine\Config\Uppercase::WORDS);

        $this->assertInstanceOf(Twine\Str::class, $ucWords);
        $this->assertEquals('John Pinkerton', $ucWords);
    }

    #[Test]
    public function it_can_uppercase_a_multibyte_string(): void
    {
        $string = new Twine\Str('джон пинкертон');

        $uppercased = $string->uppercase();
        $uppercasedFirst = $string->uppercase(Twine\Config\Uppercase::FIRST);
        $uppercasedWords = $string->uppercase(Twine\Config\Uppercase::WORDS);

        $this->assertInstanceOf(Twine\Str::class, $uppercased);
        $this->assertEquals('ДЖОН ПИНКЕРТОН', $uppercased);
        $this->assertEquals('Джон пинкертон', $uppercasedFirst);
        $this->assertEquals('Джон Пинкертон', $uppercasedWords);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $uppercased = $string->uppercase();

        $this->assertEquals('ASCII', mb_detect_encoding($uppercased));
    }
}
