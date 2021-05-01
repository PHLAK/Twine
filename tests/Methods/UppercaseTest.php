<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

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
        $string = new Twine\Str('джон пинкертон');

        $uppercased = $string->uppercase();
        $uppercasedFirst = $string->uppercase(Twine\Config\Uppercase::FIRST);
        $uppercasedWords = $string->uppercase(Twine\Config\Uppercase::WORDS);

        $this->assertInstanceOf(Twine\Str::class, $uppercased);
        $this->assertEquals('ДЖОН ПИНКЕРТОН', $uppercased);
        $this->assertEquals('Джон пинкертон', $uppercasedFirst);
        $this->assertEquals('Джон Пинкертон', $uppercasedWords);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $uppercased = $string->uppercase();

        $this->assertEquals('ASCII', mb_detect_encoding($uppercased));
    }
}
