<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class AliasesTest extends TestCase
{
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

    public function test_it_has_an_alias_for_lowercase_first()
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcFirst = $string->lowercase(Twine\Config\Lowercase::FIRST);
        $alias = $string->lowercaseFirst();

        $this->assertEquals($lcFirst, $alias);
    }

    public function test_it_has_an_alias_for_lowercase_words()
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcWords = $string->lowercase(Twine\Config\Lowercase::WORDS);
        $alias = $string->lowercaseWords();

        $this->assertEquals($lcWords, $alias);
    }

    public function test_it_has_an_alias_for_wrap_soft()
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedSoft = $string->wrap(5, "\n", Twine\Config\Wrap::SOFT);
        $alias = $string->wrapSoft(5);

        $this->assertEquals($wrappedSoft, $alias);
    }

    public function test_it_has_an_alias_for_wrap_hard()
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedHard = $string->wrap(5, "\n", Twine\Config\Wrap::HARD);
        $alias = $string->wrapHard(5);

        $this->assertEquals($wrappedHard, $alias);
    }

    public function test_it_has_an_alias_for_pad_right()
    {
        $string = new Twine\Str('john pinkerton');

        $rightPadded = $string->padRight(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $rightPadded);
        $this->assertEquals('john pinkerton______', $rightPadded);
    }

    public function test_it_has_an_alias_for_pad_left()
    {
        $string = new Twine\Str('john pinkerton');

        $leftPadded = $string->padLeft(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $leftPadded);
        $this->assertEquals('______john pinkerton', $leftPadded);
    }

    public function test_it_has_an_alias_for_pad_both()
    {
        $string = new Twine\Str('john pinkerton');

        $padded = $string->padBoth(20, '_');

        $this->assertInstanceOf(Twine\Str::class, $padded);
        $this->assertEquals('___john pinkerton___', $padded);
    }

    public function test_it_has_an_alis_for_trim_left()
    {
        $string = new Twine\Str('john pinkerton');

        $leftTrimmed = $string->trimLeft('jton');

        $this->assertInstanceOf(Twine\Str::class, $leftTrimmed);
        $this->assertEquals('hn pinkerton', $leftTrimmed);
    }

    public function test_it_has_an_alias_for_trim_right()
    {
        $string = new Twine\Str('john pinkerton');

        $rightTrimmed = $string->trimRight('jton');

        $this->assertInstanceOf(Twine\Str::class, $rightTrimmed);
        $this->assertEquals('john pinker', $rightTrimmed);
    }

    public function test_it_has_an_alias_for_base64_encode()
    {
        $string = new Twine\Str('john pinkerton');

        $base64 = $string->base64(Twine\Config\Base64::ENCODE);
        $alias = $string->base64Encode();

        $this->assertEquals($base64, $alias);
    }

    public function test_it_has_an_alias_for_base64_decode()
    {
        $string = new Twine\Str('john pinkerton');

        $plaintext = $string->base64(Twine\Config\Base64::DECODE);
        $alias = $string->base64Decode();

        $this->assertEquals($plaintext, $alias);
    }

    public function test_it_has_an_alias_for_hex_encode()
    {
        $string = new Twine\Str('john pinkerton');

        $hex = $string->hex(Twine\Config\Hex::ENCODE);
        $alias = $string->hexEncode();

        $this->assertEquals($hex, $alias);
    }

    public function test_it_has_an_alias_for_hex_decode()
    {
        $string = new Twine\Str('\x6a\x6f\x68\x6e\x20\x70\x69\x6e\x6b\x65\x72\x74\x6f\x6e');

        $plaintext = $string->hex(Twine\Config\Hex::DECODE);
        $alias = $string->hexDecode();

        $this->assertEquals($plaintext, $alias);
    }

    public function test_it_has_an_alias_for_insensitive_match()
    {
        $string = new Twine\Str('john pinkerton');

        $matches = $string->equals('JoHN PiNKeRToN', Twine\Config\Equals::CASE_INSENSITIVE);
        $matchesAlias = $string->insensitiveMatch('JoHN PiNKeRToN');
        $differs = $string->equals('BoB BeLCHeR', Twine\Config\Equals::CASE_INSENSITIVE);
        $differsAlias = $string->insensitiveMatch('BoB BeLCHeR');

        $this->assertEquals($matches, $matchesAlias);
        $this->assertEquals($differs, $differsAlias);
    }

    public function test_it_has_an_alias_for_first()
    {
        $string = new Twine\Str('john pinkerton');

        $first = $string->first(4);

        $this->assertEquals('john', $first);
    }

    public function test_it_has_an_alias_for_last()
    {
        $string = new Twine\Str('john pinkerton');

        $last = $string->last(9);

        $this->assertEquals('pinkerton', $last);
    }
}
