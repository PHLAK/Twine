<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class LowercaseWordsTest extends TestCase
{
    #[Test]
    public function it_can_lowercase_the_first_letter_of_each_word(): void
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcWords = $string->lowercaseWords();

        $this->assertInstanceOf(Twine\Str::class, $lcWords);
        $this->assertEquals('jOHN pINKERTON', $lcWords);
    }

    #[Test]
    public function it_can_lowercase_the_first_leter_of_each_word_of_a_multibyte_string(): void
    {
        $first = new Twine\Str('ДЖОН ПИНКЕРТОН');

        $lowercasedWords = $first->lowercaseWords();

        $this->assertInstanceOf(Twine\Str::class, $lowercasedWords);
        $this->assertEquals('дЖОН пИНКЕРТОН', $lowercasedWords);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('JOHN PINKERTON', 'ASCII');

        $lowercasedWords = $string->lowercaseWords();

        $this->assertEquals('ASCII', mb_detect_encoding($lowercasedWords));
    }
}
