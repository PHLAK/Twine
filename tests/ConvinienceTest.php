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
}
