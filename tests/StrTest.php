<?php

use Twine\Exceptions\InvalidConfigOptionException;

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

    public function test_it_throws_an_exception_when_uppercasing_with_an_invalid_config_option()
    {
        $this->expectException(InvalidConfigOptionException::class);

        $this->string->uppercase('invalid');
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

    public function test_it_throws_an_exception_when_lowercasing_with_an_invalid_config_option()
    {
        $this->expectException(InvalidConfigOptionException::class);

        $this->string->lowercase('invalid');
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

    public function test_it_throws_an_exception_when_trimming_with_an_invalid_config_option()
    {
        $this->expectException(InvalidConfigOptionException::class);

        $this->string->trim(Twine\Config::TRIM_MASK, 'invalid');
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

    public function test_it_can_calculate_the_crc32_polynomial()
    {
        $string = $this->string->crc32();

        $this->assertEquals(3367853299, $string);
    }

    public function test_it_can_be_hashed_with_crypt()
    {
        $string = $this->string->crypt('NaCl');

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('Naq9mOMsN7Yac', $string);
}

    public function test_it_can_be_hashed_with_md5()
    {
        $string = $this->string->md5();
        $raw = $this->string->md5(true);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('30cac4703a16a2201ec5cafbd600d803', $string);
        $this->assertEquals(base64_decode('MMrEcDoWoiAexcr71gDYAw=='), $raw);
    }

    public function test_it_can_be_hashed_with_sha1()
    {
        $string = $this->string->sha1();
        $raw = $this->string->sha1(true);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('fcaf28c7705ba8f267472bb5aa8ad883f6bf0427', $string);
        $this->assertEquals(base64_decode('/K8ox3BbqPJnRyu1qorYg/a/BCc='), $raw);
    }

    public function test_it_can_be_hashed_with_sha256()
    {
        $string = $this->string->sha256();
        $raw = $this->string->sha256(true);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('7434f26c8c2fc83e57347feb2dfb235c2f47b149b54b80692beca9d565159dfd', $string);
        $this->assertEquals(base64_decode('dDTybIwvyD5XNH/rLfsjXC9HsUm1S4BpK+yp1WUVnf0='), $raw);
    }

    public function test_it_can_be_base64_encoded_and_decoded()
    {
        $string = $this->string->base64();

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('am9obiBwaW5rZXJ0b24=', $string);
        $this->assertEquals('john pinkerton', $string->base64(Twine\Config::BASE64_DECODE));
    }

    public function test_it_throws_an_exception_when_base64_encoded_with_an_invalid_config_option()
    {
        $this->expectException(InvalidConfigOptionException::class);

        $this->string->base64('invalid');
    }

    public function test_it_can_be_chunked()
    {
        $string = $this->string->chunk(5);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals("john \r\npinke\r\nrton\r\n", $string);
    }

    public function test_it_can_be_wrapped()
    {
        $string = $this->string->wrap(5);
        $agressive = $this->string->wrap(5, "\n", true);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals("john\npinkerton", $string);
        $this->assertEquals("john\npinke\nrton", $agressive);
    }

    public function test_it_is_repeatable()
    {
        $string = $this->string->repeat(2);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('john pinkertonjohn pinkerton', $string);
    }

    public function test_it_can_replace_parts_of_the_string()
    {
        $string = $this->string->replace('john', 'bob', $count);

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('bob pinkerton', $string);
        $this->assertEquals(1, $count);
    }

    public function test_it_can_be_shuffled()
    {
        $string = $this->string->shuffle();

        while ($this->string == $string) {
            $string = $this->string->shuffle();
        }

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertNotEquals($this->string, $string);
        $this->assertRegExp('/[ ehijknoprt]{14}/', (string) $string);
    }

    public function test_it_can_be_split_into_an_array()
    {
        $string = $this->string->split(3);

        $this->assertEquals(['joh', 'n p', 'ink', 'ert', 'on'], $string);
    }

    public function test_it_can_explode_into_an_array()
    {
        $string = $this->string->explode(' ');

        $this->assertEquals(['john', 'pinkerton'], $string);
    }

    public function test_it_can_count_the_characters_in_the_string()
    {
        // TODO: Test all the modes
        $charCount = $this->string->characters();

        $this->assertEquals([
            32 => 1, 101 => 1, 104 => 1, 105 => 1, 106 => 1, 107 => 1,
            110 => 3, 111 => 2, 112 => 1, 114 => 1, 116 => 1
        ], $charCount);
    }

    public function test_it_can_count_the_words_in_the_string()
    {
        $wordCount = $this->string->words();
        $wordArray = $this->string->words(Twine\Config::WORD_ARRAY);
        $wordPositions = $this->string->words(Twine\Config::WORD_POSITIONS);

        $this->assertEquals(2, $wordCount);
        $this->assertEquals(['john', 'pinkerton'], $wordArray);
        $this->assertEquals([0 => 'john', 1 => 'pinkerton'], $wordArray);
    }

    public function test_it_can_strip_html_and_php_tags()
    {
        $string = (new Twine\Str("<b>Name:</b> <?php echo 'john pinkerton'; ?><br>"))->strip('<br>');

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('Name: <br>', $string);
    }

    public function test_it_can_find_a_substring()
    {
        $first = $this->string->find('pink');
        $last = $this->string->find('pink', 0, Twine\Config::FIND_LAST);
        $firstI = $this->string->find('PiNk', 0, Twine\Config::FIND_FIRST_I);
        $lastI =$this->string->find('PiNk', 0, Twine\Config::FIND_LAST_I);

        $this->assertEquals(5, $first);
        $this->assertEquals(5, $last);
        $this->assertEquals(5, $firstI);
        $this->assertEquals(5, $lastI);
    }

    public function test_it_throws_an_exception_when_finding_with_an_invalid_config_option()
    {
        $this->expectException(InvalidConfigOptionException::class);

        $this->string->find('pink', 0, 'invalid');
    }

    public function test_it_can_get_a_substring()
    {
        $substring = $this->string->substring(5);
        $partial = $this->string->substring(5, 4);

        $this->assertInstanceOf(Twine\Str::class, $substring);
        $this->assertEquals('pinkerton', $substring);
        $this->assertEquals('pink', $partial);
    }

    public function test_it_can_be_compared_to_another_string()
    {
        $comparison = $this->string->compare('pink');
        $caseSensitive = $this->string->compare('PiNK');
        $caseInsensitive = $this->string->compare('PiNK', Twine\Config::COMPARE_CASE_INSENSITIVE);

        $this->assertEquals(-6, $comparison);
        $this->assertEquals(26, $caseSensitive);
        $this->assertEquals(-6, $caseInsensitive);
    }

    public function test_it_can_count_substring_occurrences()
    {
        $string = new Twine\Str('How much wood could a woodchuck chuck if a woodchuck could chuck wood?');
        $count = $string->count('wood');

        $this->assertEquals(4, $count);
    }
}
