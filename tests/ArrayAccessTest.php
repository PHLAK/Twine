<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;

class ArrayAccessTest extends TestCase
{
    public function test_it_can_be_returned_as_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertEquals('john pinkerton', $string);
    }

    public function test_it_can_be_access_characters_via_array_notation()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue(isset($string[5]));
        $this->assertEquals('p', $string[5]);
    }
}
