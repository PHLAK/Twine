<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class ConvenienceTest extends TestCase
{
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
