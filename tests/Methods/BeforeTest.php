<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class BeforeTest extends TestCase
{
    public function test_it_can_get_part_of_a_string_before_a_character()
    {
        $string = new Twine\Str('john pinkerton');

        $firstName = $string->before(' ');

        $this->assertInstanceOf(Twine\Str::class, $firstName);
        $this->assertEquals('john', $firstName);
    }

    public function test_it_can_get_part_of_a_string_before_a_character_with_multiple_delimiters()
    {
        $string = new Twine\Str('john pinkerton jr');

        $firstName = $string->before(' ');

        $this->assertInstanceOf(Twine\Str::class, $firstName);
        $this->assertEquals('john', $firstName);
    }

    public function test_it_can_get_part_of_a_multibyte_string_before_a_mltibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $firstName = $string->before('本');

        $this->assertInstanceOf(Twine\Str::class, $firstName);
        $this->assertEquals('宮', $firstName);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $firstName = $string->before(' ');

        $this->assertEquals('ASCII', mb_detect_encoding($firstName));
    }
}
