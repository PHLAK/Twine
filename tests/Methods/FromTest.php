<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class FromTest extends TestCase
{
    public function test_it_can_get_part_of_a_string_starting_from_another_string()
    {
        $string = new Twine\Str('john pinkerton');

        $from = $string->from('pink');

        $this->assertInstanceOf(Twine\Str::class, $from);
        $this->assertEquals('pinkerton', $from);
    }

    public function test_it_returns_an_empty_string_when_getting_part_of_a_string_from_a_non_existent_string()
    {
        $string = new Twine\Str('john pinkerton');

        $from = $string->from('purple');

        $this->assertInstanceOf(Twine\Str::class, $from);
        $this->assertEquals('', $from);
    }

    public function test_it_can_get_part_of_a_multibyte_string_starting_from_another_string()
    {
        $string = new Twine\Str('宮本 茂');

        $from = $string->from('本');

        $this->assertInstanceOf(Twine\Str::class, $from);
        $this->assertEquals('本 茂', $from);
    }
}
