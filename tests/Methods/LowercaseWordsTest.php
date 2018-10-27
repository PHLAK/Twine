<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

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
}
