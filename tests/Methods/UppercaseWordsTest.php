<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class UppercaseWordsTest extends TestCase
{
    public function test_it_can_uppercase_the_first_letter_of_each_word()
    {
        $string = new Twine\Str('john pinkerton');

        $ucWords = $string->uppercaseWords();

        $this->assertInstanceOf(Twine\Str::class, $ucWords);
        $this->assertEquals('John Pinkerton', $ucWords);
    }

    public function test_it_can_uppercase_the_first_letter_of_each_word_of_a_multibyte_string()
    {
        $string = new Twine\Str('джон пинкертон');

        $uppercasedWords = $string->uppercaseWords();

        $this->assertInstanceOf(Twine\Str::class, $uppercasedWords);
        $this->assertEquals('Джон Пинкертон', $uppercasedWords);
    }
}
