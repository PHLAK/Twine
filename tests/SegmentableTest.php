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
}
