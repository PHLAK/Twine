<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;
use PHLAK\Twine\Exceptions\InvalidConfigOptionException;

class ConvinienceTest extends TestCase
{
    public function test_it_can_be_base64_encoded_and_decoded()
    {
        $string = new Twine\Str('john pinkerton');

        $base64 = $string->base64();

        $this->assertInstanceOf(Twine\Str::class, $base64);
        $this->assertEquals('am9obiBwaW5rZXJ0b24=', $base64);
        $this->assertEquals('john pinkerton', $base64->base64(Twine\Config\Base64::DECODE));
    }

    public function test_it_throws_an_exception_when_base64_encoded_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(InvalidConfigOptionException::class);

        $string->base64('invalid');
    }

    public function test_it_can_count_substring_occurrences()
    {
        $string = new Twine\Str('How much wood could a woodchuck chuck if a woodchuck could chuck wood?');

        $count = $string->count('wood');

        $this->assertEquals(4, $count);
    }

    public function test_it_can_be_formatted()
    {
        $string = new Twine\Str('Hello %s! Welcome to %s, population %b.');

        $formatted = $string->format('John', 'Pinkertown', 1337);

        $this->assertInstanceOf(Twine\Str::class, $formatted);
        $this->assertEquals('Hello John! Welcome to Pinkertown, population 10100111001.', $formatted);
    }

    public function test_it_has_a_length()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertEquals(14, $string->length());
    }
}
