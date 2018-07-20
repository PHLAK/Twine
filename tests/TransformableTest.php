<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\InvalidConfigOptionException;
use PHPUnit\Framework\TestCase;

class TransformableTest extends TestCase
{
    public function test_it_can_append_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $appended = $string->append(' jr');

        $this->assertInstanceOf(Twine\Str::class, $appended);
        $this->assertEquals('john pinkerton jr', $appended);
    }

    public function test_it_can_append_multiple_strings()
    {
        $first = new Twine\Str('john');
        $last = new Twine\STr('pinkerton');

        $appended = $first->append(' ', $last);

        $this->assertInstanceOf(Twine\Str::class, $appended);
        $this->assertEquals('john pinkerton', $appended);
    }

    public function test_it_can_prepended_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $prepended = $string->prepend('mr ');

        $this->assertInstanceOf(Twine\Str::class, $prepended);
        $this->assertEquals('mr john pinkerton', $prepended);
    }

    public function test_it_can_prepended_multiple_strings()
    {
        $first = new Twine\Str('john');
        $last = new Twine\Str('pinkerton');

        $prepended = $last->prepend($first, ' ');

        $this->assertInstanceOf(Twine\Str::class, $prepended);
        $this->assertEquals('john pinkerton', $prepended);
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

        $this->expectException(InvalidConfigOptionException::class);

        $string->lowercase('invalid');
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

        while ($string === $shuffled) {
            $shuffled = $string->shuffle();
        }

        $this->assertInstanceOf(Twine\Str::class, $shuffled);
        $this->assertNotEquals($string, $shuffled);
        $this->assertRegExp('/[ ehijknoprt]{14}/', (string) $shuffled);
    }

    public function test_it_can_be_repeated()
    {
        $string = new Twine\Str('john pinkerton');

        $repeated = $string->repeat(2);

        $this->assertInstanceOf(Twine\Str::class, $repeated);
        $this->assertEquals('john pinkertonjohn pinkerton', $repeated);
    }

    public function test_it_can_be_wrapped()
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedSoft = $string->wrap(5);
        $wrappedHard = $string->wrap(5, "\n", Twine\Config\Wrap::HARD);

        $this->assertInstanceOf(Twine\Str::class, $wrappedSoft);
        $this->assertEquals("john\npinkerton", $wrappedSoft);
        $this->assertEquals("john\npinke\nrton", $wrappedHard);
    }

    public function test_it_can_be_padded()
    {
        $string = new Twine\Str('john pinkerton');

        $rightPad = $string->pad(20, '_');
        $leftPad = $string->pad(20, '_', Twine\Config\Pad::LEFT);
        $bothPad = $string->pad(20, '_', Twine\Config\Pad::BOTH);

        $this->assertInstanceOf(Twine\Str::class, $rightPad);
        $this->assertEquals('john pinkerton______', $rightPad);
        $this->assertEquals('______john pinkerton', $leftPad);
        $this->assertEquals('___john pinkerton___', $bothPad);
    }

    public function test_it_throws_an_exception_when_padding_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(InvalidConfigOptionException::class);

        $string->pad(20, '_', 99);
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

        $leftTrimmed = $string->trim('jton', Twine\Config\Trim::LEFT);

        $this->assertInstanceOf(Twine\Str::class, $leftTrimmed);
        $this->assertEquals('hn pinkerton', $leftTrimmed);
    }

    public function test_it_can_trim_characters_from_the_right_only()
    {
        $string = new Twine\Str('john pinkerton');

        $rightTrimmed = $string->trim('jton', Twine\Config\Trim::RIGHT);

        $this->assertInstanceOf(Twine\Str::class, $rightTrimmed);
        $this->assertEquals('john pinker', $rightTrimmed);
    }

    public function test_it_throws_an_exception_when_trimming_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(InvalidConfigOptionException::class);

        $string->trim(' ', 'invalid');
    }
}
