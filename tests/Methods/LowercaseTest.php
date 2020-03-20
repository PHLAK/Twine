<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use PHPUnit\Framework\TestCase;

class LowercaseTest extends TestCase
{
    public function test_it_can_be_lowercased()
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lowercased = $string->lowercase();

        $this->assertInstanceOf(Twine\Str::class, $lowercased);
        $this->assertEquals('john pinkerton', $lowercased);
    }

    public function test_it_can_lowercase_the_first_letter_only()
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcFirst = $string->lowercase(Twine\Config\Lowercase::FIRST);

        $this->assertInstanceOf(Twine\Str::class, $lcFirst);
        $this->assertEquals('jOHN PINKERTON', $lcFirst);
    }

    public function test_it_can_lowercase_the_first_letter_of_each_word()
    {
        $string = new Twine\Str("JOHN PINKERTON\nJOHN\tPINKERTON");

        $lcWords = $string->lowercase(Twine\Config\Lowercase::WORDS);

        $this->assertInstanceOf(Twine\Str::class, $lcWords);
        $this->assertEquals("jOHN pINKERTON\njOHN\tpINKERTON", $lcWords);
    }

    public function test_it_throws_an_exception_when_lowercasing_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(ConfigException::class);

        $string->lowercase('invalid');
    }

    public function test_it_can_lowercase_a_multibyte_string()
    {
        $first = new Twine\Str('ДЖОН ПИНКЕРТОН');

        $lowercased = $first->lowercase();
        $lowercasedFirst = $first->lowercase(Twine\Config\Lowercase::FIRST);
        $lowercasedWords = $first->lowercase(Twine\Config\Lowercase::WORDS);

        $this->assertInstanceOf(Twine\Str::class, $lowercased);
        $this->assertEquals('джон пинкертон', $lowercased);
        $this->assertEquals('дЖОН ПИНКЕРТОН', $lowercasedFirst);
        $this->assertEquals('дЖОН пИНКЕРТОН', $lowercasedWords);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('JOHN PINKERTON', 'ASCII');

        $lowercased = $string->lowercase();

        $this->assertEquals('ASCII', mb_detect_encoding($lowercased));
    }
}
