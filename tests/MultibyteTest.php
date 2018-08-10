<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class MultibyteTest extends TestCase
{
    public function test_it_can_lowercase_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $lowercase = $string->lowerCase();

        $this->assertEquals('宮本 茂', $lowercase);
    }

    public function test_it_can_uppercase_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $uppercase = $string->upperCase();

        $this->assertEquals('宮本 茂', $uppercase);
    }

    public function test_it_can_determine_if_it_starts_with_a_multibyte_character()
    {
        $string = new Twine\Str('宮本 茂');

        $this->assertTrue($string->startsWith('宮本'));
        $this->assertFalse($string->startsWith('茂'));
    }

    public function test_it_can_determine_if_it_ends_with_a_multibyte_character()
    {
        $string = new Twine\Str('宮本 茂');

        $this->assertTrue($string->endsWith('茂'));
        $this->assertFalse($string->endsWith('宮本'));
    }

    public function test_it_can_determine_if_it_contains_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $this->assertTrue($string->contains('本'));
        $this->assertFalse($string->contains('任'));
    }

    public function test_it_can_determine_the_length_of_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $length = $string->length();

        $this->assertEquals(4, $length);
    }

    public function test_it_can_count_the_number_of_occurrences_of_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂 宮本 茂 宮本');

        $count = $string->count('宮本');

        $this->assertEquals(3, $count);
    }

    public function test_it_can_encode_a_multibyte_string_to_hex()
    {
        $string = new Twine\Str('宮本 茂');

        $hex = $string->hex();

        $this->assertEquals('\x5bae\x672c\x20\x8302', $hex);

        return $hex;
    }

    /** @depends test_it_can_encode_a_multibyte_string_to_hex */
    public function test_it_can_decode_a_multibyte_string_from_hex(Twine\Str $hex)
    {
        $plaintext = $hex->hex(Twine\Config\Hex::DECODE);

        $this->assertEquals('宮本 茂', $plaintext);
    }

    public function test_it_can_get_a_substring()
    {
        $string = new Twine\Str('宮本 茂');

        $substring = $string->substring(0, 2);

        $this->assertEquals('宮本', $substring);
    }

    public function test_it_can_get_part_of_the_string_before_a_multibyte_character()
    {
        $string = new Twine\Str('宮本 茂');

        $before = $string->before('本');

        $this->assertEquals('宮', $before);
    }

    public function test_it_can_get_part_of_the_string_after_a_multibyte_character()
    {
        $string = new Twine\Str('宮本 茂');

        $after = $string->after('本');

        $this->assertEquals(' 茂', $after);
    }

    public function test_it_can_truncate_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $truncated = $string->truncate(4, '...');

        $this->assertEquals('宮...', $truncated);
    }

    public function test_it_can_truncate_a_multibyte_string_to_a_word_boundry()
    {
        $string = new Twine\Str('宮本 茂');

        $truncated = $string->truncate(4, '~');

        $this->assertEquals('宮本~', $truncated);
    }
}
