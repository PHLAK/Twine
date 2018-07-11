<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    public function test_it_can_be_accessed_as_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertEquals('john pinkerton', $string);
    }

    public function test_it_can_access_characters_via_array_notation()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue(isset($string[5]));
        $this->assertEquals('p', $string[5]);
    }

    public function test_it_can_be_converted_to_a_string_when_serialized()
    {
        $string = new Twine\Str('john pinkerton');

        $array = [
            'name' => $string
        ];

        $json  = json_encode($array);
        $array = json_decode($json, true);

        $this->assertEquals('john pinkerton', $array['name']);
    }


    public function test_it_thows_an_exception_when_modifyinging_characters_with_array_notation()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(\RuntimeException::class);

        $string[5] = 'z';
    }

    public function test_it_thows_an_exception_when_unsetting_characters_with_array_notation()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(\RuntimeException::class);

        unset($string[5]);
    }
}
