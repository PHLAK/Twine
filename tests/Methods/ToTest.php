<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class ToTest extends TestCase
{
    public function test_it_can_get_part_of_a_string_ending_with_another_string()
    {
        $string = new Twine\Str('john pinkerton');

        $to = $string->to('pink');

        $this->assertInstanceOf(Twine\Str::class, $to);
        $this->assertEquals('john pink', $to);
    }

    public function test_it_returns_an_empty_string_when_getting_part_of_a_string_ending_with_a_non_existent_string()
    {
        $string = new Twine\Str('john pinkerton');

        $to = $string->to('purple');

        $this->assertInstanceOf(Twine\Str::class, $to);
        $this->assertEquals('', $to);
    }

    public function test_it_can_get_part_of_a_multibyte_string_ending_with_another_string()
    {
        $string = new Twine\Str('宮本 茂');

        $to = $string->to('本');

        $this->assertInstanceOf(Twine\Str::class, $to);
        $this->assertEquals('宮本', $to);
    }
}
