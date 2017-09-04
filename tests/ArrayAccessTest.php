<?php

use PHLAK\Twine;

class ArrayAccessTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->string = new Twine\Str('john pinkerton');
    }

    public function test_it_can_be_returned_as_a_string()
    {
        $this->assertEquals('john pinkerton', $this->string);
    }

    public function test_it_can_be_access_characters_via_array_notation()
    {
        $this->assertTrue(isset($this->string[5]));
        $this->assertEquals('p', $this->string[5]);
    }
}
