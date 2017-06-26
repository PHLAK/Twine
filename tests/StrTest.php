<?php

use Twine\Exceptions\InvalidTypeException;

class StrTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->string = new Twine\Str('john pinkerton');
    }

    public function test_it_can_be_returned_as_a_string()
    {
        $this->assertEquals('john pinkerton', $this->string);
    }

    public function test_it_has_a_length()
    {
        $this->assertEquals(14, $this->string->length());
    }

    public function test_it_can_be_appended()
    {
        $string = $this->string->append(' jr');

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('john pinkerton jr', $string);
    }

    public function test_it_can_be_prepended()
    {
        $string = $this->string->prepend('mr ');

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('mr john pinkerton', $string);
    }

    public function test_it_can_be_reversed()
    {
        $string = $this->string->reverse();

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('notreknip nhoj', $string);
    }

    public function test_it_can_be_uppercased()
    {
        $string = $this->string->uppercase();

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('JOHN PINKERTON', $string);
    }

    public function test_it_can_uppercase_the_first_letter_only()
    {
        $string = $this->string->uppercase(Twine\Config::UC_FIRST);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('John pinkerton', $string);
    }

    public function test_it_can_uppercase_the_first_letter_of_each_word()
    {
        $string = $this->string->uppercase(Twine\Config::UC_WORDS);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('John Pinkerton', $string);
    }

    public function test_it_throws_an_exception_when_uppercasing_with_an_invalid_type()
    {
        $this->expectException(InvalidTypeException::class);

        $this->string->uppercase('invalid_type');
    }

    public function test_it_can_be_lowercased()
    {
        $string = $this->string->uppercase()->lowercase();
        // $string = (new Twine\Str('JOHN PINKERTON'))->lowercase();

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('john pinkerton', $string);
    }

    public function test_it_can_lowercase_the_first_letter_only()
    {
        $string = $this->string->uppercase()->lowercase(Twine\Config::LC_FIRST);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('jOHN PINKERTON', $string);
    }

    public function test_it_can_lowercase_the_first_letter_of_each_word()
    {
        $string = $this->string->uppercase()->lowercase(Twine\Config::LC_WORDS);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('jOHN pINKERTON', $string);
    }

    public function test_it_throws_an_exception_when_lowercasing_with_an_invalid_type()
    {
        $this->expectException(InvalidTypeException::class);

        $this->string->lowercase('invalid_type');
    }

    public function test_it_can_trim_excess_whitespace()
    {
        $string = (new Twine\Str('   foo bar     '))->trim();

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('foo bar', $string);
    }

    public function test_it_can_trim_specific_chracters()
    {
        $string = $this->string->trim('jton');

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('hn pinker', $string);
    }

    public function test_it_can_trim_characters_from_the_left_only()
    {
        $string = $this->string->trim('jton', Twine\Config::TRIM_LEFT);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('hn pinkerton', $string);
    }

    public function test_it_can_trim_characters_from_the_right_only()
    {
        $string = $this->string->trim('jton', Twine\Config::TRIM_RIGHT);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('john pinker', $string);
    }

    public function test_it_throws_an_exception_when_trimming_with_an_invalid_type()
    {
        $this->expectException(InvalidTypeException::class);

        $this->string->trim(Twine\Config::TRIM_MASK, 'invalid_type');
    }

    public function test_it_can_be_padded_on_the_right()
    {
        $string = $this->string->pad(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('john pinkerton______', $string);
    }

    public function test_it_can_be_padded_on_the_left()
    {
        $string = $this->string->pad(20, '_', Twine\Config::PAD_LEFT);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('______john pinkerton', $string);
    }

    public function test_it_can_be_padded_on_both_sides()
    {
        $string = $this->string->pad(20, '_', Twine\Config::PAD_BOTH);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('___john pinkerton___', $string);
    }
}
