<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class LowercaseWordsTest extends TestCase
{
    public function test_it_can_lowercase_the_first_letter_of_each_word()
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcWords = $string->lowercaseWords();

        $this->assertInstanceOf(Twine\Str::class, $lcWords);
        $this->assertEquals('jOHN pINKERTON', $lcWords);
    }

    public function test_it_can_lowercase_the_first_leter_of_each_word_of_a_multibyte_string()
    {
        $first = new Twine\Str('ДЖОН ПИНКЕРТОН');

        $lowercasedWords = $first->lowercaseWords();

        $this->assertInstanceOf(Twine\Str::class, $lowercasedWords);
        $this->assertEquals('дЖОН пИНКЕРТОН', $lowercasedWords);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('JOHN PINKERTON', 'ASCII');

        $lowercasedWords = $string->lowercaseWords();

        $this->assertEquals('ASCII', mb_detect_encoding($lowercasedWords));
    }
}
