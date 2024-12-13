<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class UppercaseWordsTest extends TestCase
{
    #[Test]
    public function it_can_uppercase_the_first_letter_of_each_word(): void
    {
        $string = new Twine\Str('john pinkerton');

        $ucWords = $string->uppercaseWords();

        $this->assertInstanceOf(Twine\Str::class, $ucWords);
        $this->assertEquals('John Pinkerton', $ucWords);
    }

    #[Test]
    public function it_can_uppercase_the_first_letter_of_each_word_of_a_multibyte_string(): void
    {
        $string = new Twine\Str('джон пинкертон');

        $uppercasedWords = $string->uppercaseWords();

        $this->assertInstanceOf(Twine\Str::class, $uppercasedWords);
        $this->assertEquals('Джон Пинкертон', $uppercasedWords);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $uppercasedWords = $string->uppercaseWords();

        $this->assertEquals('ASCII', mb_detect_encoding($uppercasedWords));
    }
}
