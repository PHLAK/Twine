<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class AfterTest extends TestCase
{
    public function test_it_can_get_part_of_a_string_after_a_character()
    {
        $string = new Twine\Str('john pinkerton');

        $lastName = $string->after(' ');

        $this->assertInstanceOf(Twine\Str::class, $lastName);
        $this->assertEquals('pinkerton', $lastName);
    }

    public function test_it_can_get_part_of_a_string_after_a_character_with_multiple_delimiters()
    {
        $string = new Twine\Str('john pinkerton jr');

        $lastNameAndSuffix = $string->after(' ');

        $this->assertInstanceOf(Twine\Str::class, $lastNameAndSuffix);
        $this->assertEquals('pinkerton jr', $lastNameAndSuffix);
    }

    public function test_it_can_get_part_of_a_multibyte_string_after_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $after = $string->after('本');

        $this->assertInstanceOf(Twine\Str::class, $after);
        $this->assertEquals(' 茂', $after);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $lastName = $string->after(' ');

        $this->assertAttributeEquals('ASCII', 'encoding', $lastName);
    }
}
