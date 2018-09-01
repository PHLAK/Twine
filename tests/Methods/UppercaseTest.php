<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use PHPUnit\Framework\TestCase;

class UppercaseTest extends TestCase
{
    public function test_it_can_be_uppercased()
    {
        $string = new Twine\Str('john pinkerton');

        $uppercased = $string->uppercase();

        $this->assertInstanceOf(Twine\Str::class, $uppercased);
        $this->assertEquals('JOHN PINKERTON', $uppercased);
    }

    public function test_it_can_uppercase_the_first_letter_only()
    {
        $string = new Twine\Str('john pinkerton');

        $ucFirst = $string->uppercase(Twine\Config\Uppercase::FIRST);

        $this->assertInstanceOf(Twine\Str::class, $ucFirst);
        $this->assertEquals('John pinkerton', $ucFirst);
    }

    public function test_it_can_uppercase_the_first_letter_of_each_word()
    {
        $string = new Twine\Str('john pinkerton');

        $ucWords = $string->uppercase(Twine\Config\Uppercase::WORDS);

        $this->assertInstanceOf(Twine\Str::class, $ucWords);
        $this->assertEquals('John Pinkerton', $ucWords);
    }

    public function test_it_throws_an_exception_when_uppercasing_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(ConfigException::class);

        $string->uppercase('invalid');
    }

    public function test_it_can_uppercase_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $uppercased = $string->uppercase();
        $uppercasedFirst = $string->uppercase(Twine\Config\Uppercase::FIRST);
        $uppercasedWords = $string->uppercase(Twine\Config\Uppercase::WORDS);

        $this->assertEquals('宮本 茂', $uppercased);
        $this->assertEquals('宮本 茂', $uppercasedFirst);
        $this->assertEquals('宮本 茂', $uppercasedWords);
    }

    public function test_it_has_an_alias_for_uppercase_first()
    {
        $string = new Twine\Str('john pinkerton');

        $ucFirst = $string->uppercase(Twine\Config\Uppercase::FIRST);
        $alias = $string->uppercaseFirst();

        $this->assertEquals($ucFirst, $alias);
    }

    public function test_it_has_an_alias_for_uppercase_words()
    {
        $string = new Twine\Str('john pinkerton');

        $ucWords = $string->uppercase(Twine\Config\Uppercase::WORDS);
        $alias = $string->uppercaseWords();

        $this->assertEquals($ucWords, $alias);
    }
}
