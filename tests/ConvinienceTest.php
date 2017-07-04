<?php

use Twine\Exceptions\InvalidConfigOptionException;

class ConvinienceTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->string = new Twine\Str('john pinkerton');
    }

    public function test_it_has_a_length()
    {
        $this->assertEquals(14, $this->string->length());
    }

    public function test_it_can_count_substring_occurrences()
    {
        $string = new Twine\Str('How much wood could a woodchuck chuck if a woodchuck could chuck wood?');

        $count = $string->count('wood');

        $this->assertEquals(4, $count);
    }

    public function test_it_can_determine_if_it_equals_another_string_exactly()
    {
        $matches = $this->string->equals('john pinkerton');
        $differs = $this->string->equals('JoHN PiNKeRToN');

        $this->assertTrue($matches);
        $this->assertFalse($differs);
    }

    public function test_it_can_determine_if_it_equals_another_string_ignoring_case()
    {
        $matches = $this->string->equals('JoHN PiNKeRToN', Twine\Config::EQ_CASE_INSENSITIVE);
        $differs = $this->string->equals('BoB BeLCHeR', Twine\Config::EQ_CASE_INSENSITIVE);

        $this->assertTrue($matches);
        $this->assertFalse($differs);
    }
}
