<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\InvalidConfigOptionException;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    public function test_it_can_be_accessed_as_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertEquals('john pinkerton', $string);
    }

    public function test_it_can_access_characters_via_array_notation()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue(isset($string[5]));
        $this->assertEquals('p', $string[5]);
    }

    public function test_it_thows_an_exception_when_modifyinging_characters_with_array_notation()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(\RuntimeException::class);

        $string[5] = 'z';
    }

    public function test_it_thows_an_exception_when_unsetting_characters_with_array_notation()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(\RuntimeException::class);

        unset($string[5]);
    }

    public function test_it_can_return_a_substring()
    {
        $string = new Twine\Str('john pinkerton');

        $substring = $string->substring(5);
        $partial = $string->substring(5, 4);

        $this->assertInstanceOf(Twine\Str::class, $substring);
        $this->assertEquals('pinkerton', $substring);
        $this->assertEquals('pink', $partial);
    }

    public function test_it_can_append_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $appended = $string->append(' jr');

        $this->assertInstanceOf(Twine\Str::class, $appended);
        $this->assertEquals('john pinkerton jr', $appended);
    }

    public function test_it_can_prepended_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $prepended = $string->prepend('mr ');

        $this->assertInstanceOf(Twine\Str::class, $prepended);
        $this->assertEquals('mr john pinkerton', $prepended);
    }

    public function test_it_can_insert_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $inserted = $string->insert('athan', 4);

        $this->assertInstanceOf(Twine\Str::class, $inserted);
        $this->assertEquals('johnathan pinkerton', $inserted);
    }

    public function test_it_can_uppercase_all_or_parts_of_the_string()
    {
        $string = new Twine\Str('john pinkerton');

        $uppercased = $string->uppercase();

        $this->assertInstanceOf(Twine\Str::class, $uppercased);
        $this->assertEquals('JOHN PINKERTON', $uppercased);
    }

    public function test_it_can_uppercase_the_first_letter_only()
    {
        $string = new Twine\Str('john pinkerton');

        $ucFirst = $string->uppercase(Twine\Config::UC_FIRST);

        $this->assertInstanceOf(Twine\Str::class, $ucFirst);
        $this->assertEquals('John pinkerton', $ucFirst);
    }

    public function test_it_can_uppercase_the_first_letter_of_each_word()
    {
        $string = new Twine\Str('john pinkerton');

        $ucWords = $string->uppercase(Twine\Config::UC_WORDS);

        $this->assertInstanceOf(Twine\Str::class, $ucWords);
        $this->assertEquals('John Pinkerton', $ucWords);
    }

    public function test_it_throws_an_exception_when_uppercasing_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(InvalidConfigOptionException::class);

        $string->uppercase('invalid');
    }

    public function test_it_can_lowercase_all_or_parts_of_the_string()
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lowercased = $string->lowercase();

        $this->assertInstanceOf(Twine\Str::class, $lowercased);
        $this->assertEquals('john pinkerton', $lowercased);
    }

    public function test_it_can_lowercase_the_first_letter_only()
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcFirst = $string->lowercase(Twine\Config::LC_FIRST);

        $this->assertInstanceOf(Twine\Str::class, $lcFirst);
        $this->assertEquals('jOHN PINKERTON', $lcFirst);
    }

    public function test_it_can_lowercase_the_first_letter_of_each_word()
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcWords = $string->lowercase(Twine\Config::LC_WORDS);

        $this->assertInstanceOf(Twine\Str::class, $lcWords);
        $this->assertEquals('jOHN pINKERTON', $lcWords);
    }

    public function test_it_throws_an_exception_when_lowercasing_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(InvalidConfigOptionException::class);

        $string->lowercase('invalid');
    }

    public function test_it_can_be_repeated()
    {
        $string = new Twine\Str('john pinkerton');

        $repeated = $string->repeat(2);

        $this->assertInstanceOf(Twine\Str::class, $repeated);
        $this->assertEquals('john pinkertonjohn pinkerton', $repeated);
    }

    public function test_it_can_be_reversed()
    {
        $string = new Twine\Str('john pinkerton');

        $reveresed = $string->reverse();

        $this->assertInstanceOf(Twine\Str::class, $reveresed);
        $this->assertEquals('notreknip nhoj', $reveresed);
    }

    public function test_it_can_replace_parts_of_the_string()
    {
        $string = new Twine\Str('john pinkerton');

        $replaced = $string->replace('john', 'bob', $count);

        $this->assertInstanceOf(Twine\Str::class, $replaced);
        $this->assertEquals('bob pinkerton', $replaced);
        $this->assertEquals(1, $count);
    }

    public function test_it_can_be_shuffled()
    {
        $string = new Twine\Str('john pinkerton');

        $shuffled = $string->shuffle();

        while ($string == $shuffled) {
            $shuffled = $string->shuffle();
        }

        $this->assertInstanceOf(Twine\Str::class, $shuffled);
        $this->assertNotEquals($string, $shuffled);
        $this->assertRegExp('/[ ehijknoprt]{14}/', (string) $shuffled);
    }

    public function test_it_can_be_padded()
    {
        $string = new Twine\Str('john pinkerton');

        $rightPad = $string->pad(20, '_');
        $leftPad = $string->pad(20, '_', Twine\Config::PAD_LEFT);
        $bothPad = $string->pad(20, '_', Twine\Config::PAD_BOTH);

        $this->assertInstanceOf(Twine\Str::class, $rightPad);
        $this->assertEquals('john pinkerton______', $rightPad);
        $this->assertEquals('______john pinkerton', $leftPad);
        $this->assertEquals('___john pinkerton___', $bothPad);
    }

    public function test_it_throws_an_exception_when_padding_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(InvalidConfigOptionException::class);

        $string->pad(20, '_', 'invalid');
    }

    public function test_it_can_trim_excess_whitespace()
    {
        $string = new Twine\Str('   foo bar     ');

        $trimmed = $string->trim();

        $this->assertInstanceOf(Twine\Str::class, $trimmed);
        $this->assertEquals('foo bar', $trimmed);
    }

    public function test_it_can_trim_specific_chracters()
    {
        $string = new Twine\Str('john pinkerton');

        $trimmed = $string->trim('jton');

        $this->assertInstanceOf(Twine\Str::class, $trimmed);
        $this->assertEquals('hn pinker', $trimmed);
    }

    public function test_it_can_trim_characters_from_the_left_only()
    {
        $string = new Twine\Str('john pinkerton');

        $leftTrimmed = $string->trim('jton', Twine\Config::TRIM_LEFT);

        $this->assertInstanceOf(Twine\Str::class, $leftTrimmed);
        $this->assertEquals('hn pinkerton', $leftTrimmed);
    }

    public function test_it_can_trim_characters_from_the_right_only()
    {
        $string = new Twine\Str('john pinkerton');

        $rightTrimmed = $string->trim('jton', Twine\Config::TRIM_RIGHT);

        $this->assertInstanceOf(Twine\Str::class, $rightTrimmed);
        $this->assertEquals('john pinker', $rightTrimmed);
    }

    public function test_it_throws_an_exception_when_trimming_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(InvalidConfigOptionException::class);

        $string->trim(Twine\Config::TRIM_MASK, 'invalid');
    }

    public function test_it_can_be_wrapped()
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedSoft = $string->wrap(5);
        $wrappedHard = $string->wrap(5, "\n", Twine\Config::WRAP_HARD);

        $this->assertInstanceOf(Twine\Str::class, $wrappedSoft);
        $this->assertEquals("john\npinkerton", $wrappedSoft);
        $this->assertEquals("john\npinke\nrton", $wrappedHard);
    }

    public function test_it_can_get_part_of_the_string_before_a_character()
    {
        $string = new Twine\Str('john pinkerton');

        $firstName = $string->before(' ');

        $this->assertInstanceOf(Twine\Str::class, $firstName);
        $this->assertEquals('john', $firstName);
    }

    public function test_it_can_get_part_of_the_string_after_a_character()
    {
        $string = new Twine\Str('john pinkerton');

        $lastName = $string->after(' ');

        $this->assertInstanceOf(Twine\Str::class, $lastName);
        $this->assertEquals('pinkerton', $lastName);
    }

    public function test_it_can_get_part_of_the_string_before_a_character_with_multiple_delimiters()
    {
        $string = new Twine\Str('john pinkerton jr');

        $firstName = $string->before(' ');

        $this->assertEquals('john', $firstName);
    }

    public function test_it_can_get_part_of_the_string_after_a_character_with_multiple_delimiters()
    {
        $string = new Twine\Str('john pinkerton jr');

        $lastNameAndSuffix = $string->after(' ');

        $this->assertEquals('pinkerton jr', $lastNameAndSuffix);
    }
}
