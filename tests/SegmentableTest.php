<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class SegmentableTest extends TestCase
{
    public function test_it_can_return_a_substring()
    {
        $string = new Twine\Str('john pinkerton');

        $substring = $string->substring(5);
        $partial = $string->substring(5, 4);

        $this->assertInstanceOf(Twine\Str::class, $substring);
        $this->assertEquals('pinkerton', $substring);
        $this->assertEquals('pink', $partial);
    }

    public function test_it_can_get_part_of_the_string_before_a_character()
    {
        $string = new Twine\Str('john pinkerton');

        $firstName = $string->before(' ');

        $this->assertInstanceOf(Twine\Str::class, $firstName);
        $this->assertEquals('john', $firstName);
    }

    public function test_it_can_get_part_of_the_string_before_a_character_with_multiple_delimiters()
    {
        $string = new Twine\Str('john pinkerton jr');

        $firstName = $string->before(' ');

        $this->assertEquals('john', $firstName);
    }

    public function test_it_can_get_part_of_the_string_after_a_character()
    {
        $string = new Twine\Str('john pinkerton');

        $lastName = $string->after(' ');

        $this->assertInstanceOf(Twine\Str::class, $lastName);
        $this->assertEquals('pinkerton', $lastName);
    }

    public function test_it_can_get_part_of_the_string_after_a_character_with_multiple_delimiters()
    {
        $string = new Twine\Str('john pinkerton jr');

        $lastNameAndSuffix = $string->after(' ');

        $this->assertEquals('pinkerton jr', $lastNameAndSuffix);
    }

    public function test_it_can_get_part_of_the_string_starting_from_another_string()
    {
        $string = new Twine\Str('john pinkerton');

        $from = $string->from('pink');

        $this->assertEquals('pinkerton', $from);
    }

    public function test_it_returns_an_empty_string_when_getting_part_of_the_string_from_a_non_existent_string()
    {
        $string = new Twine\Str('john pinkerton');

        $from = $string->from('purple');

        $this->assertEquals('', $from);
    }

    public function test_it_can_be_truncated()
    {
        $string = new Twine\Str('john pinkerton');

        $truncated = $string->truncate(12);

        $this->assertEquals('john pink...', $truncated);
    }

    public function test_it_can_be_truncated_with_an_alternate_suffix()
    {
        $string = new Twine\Str('john pinkerton');

        $truncated = $string->truncate(10, '~');

        $this->assertEquals('john pink~', $truncated);
    }

    public function test_it_removes_whitespace_when_truncated_to_a_word_boundary()
    {
        $string = new Twine\Str('john pinkerton');

        $truncated = $string->truncate(8);

        $this->assertEquals('john...', $truncated);
    }

    public function test_a_multiline_string_can_be_truncated_properly()
    {
        $string = new Twine\Str('john pinkerton' . PHP_EOL . 'the great and powerful');

        $truncated = $string->truncate(24);

        $this->assertEquals('john pinkerton' . PHP_EOL . 'the gr...', $truncated);
    }

    public function test_a_multiline_string_is_truncated_to_one_line_when_truncated_to_a_newline()
    {
        $string = new Twine\Str('john pinkerton' . PHP_EOL . 'the great and powerful');

        $truncated = $string->truncate(18);

        $this->assertEquals('john pinkerton...', $truncated);
    }

    public function test_it_can_be_split_into_an_array_of_words()
    {
        $string = new Twine\Str('john pinkerton-jingleHeimer_ShmidtJohnson');

        $words = $string->words();

        $this->assertEquals(['john', 'pinkerton', 'jingle', 'Heimer', 'Shmidt', 'Johnson'], $words);
    }
}
