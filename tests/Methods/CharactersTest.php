<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class CharactersTest extends TestCase
{
    public function test_it_can_be_split_into_an_array_of_characters()
    {
        $string = new Twine\Str('john pinkerton');

        $characters = $string->characters();

        $this->assertEquals(['j', 'o', 'h', 'n', ' ', 'p', 'i', 'n', 'k', 'e', 'r', 't', 'o', 'n'], $characters);
        foreach ($characters as $character) {
            $this->assertInstanceOf(Twine\Str::class, $character);
        }
    }

    public function test_it_can_be_split_into_an_array_of_unique_characters()
    {
        $string = new Twine\Str('john pinkerton');

        $characters = $string->characters(Twine\Config\Characters::UNIQUE);

        $this->assertEquals(['j', 'o', 'h', 'n', ' ', 'p', 'i', 'k', 'e', 'r', 't'], $characters);
        foreach ($characters as $character) {
            $this->assertInstanceOf(Twine\Str::class, $character);
        }
    }

    public function test_a_multibyte_string_can_be_split_into_an_array_of_characters()
    {
        $string = new Twine\Str('宮本 茂');

        $characters = $string->characters();

        $this->assertEquals(['宮', '本', ' ', '茂'], $characters);
        foreach ($characters as $character) {
            $this->assertInstanceOf(Twine\Str::class, $character);
        }
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $characters = $string->characters();

        foreach ($characters as $character) {
            $this->assertAttributeEquals('ASCII', 'encoding', $character);
        }
    }
}
