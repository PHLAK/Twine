<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class EndsWithTest extends TestCase
{
    public function test_it_can_determine_if_it_ends_with_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue($string->endsWith('pinkerton'));
        $this->assertFalse($string->endsWith('john'));
    }

    public function test_it_can_determine_if_a_multibyte_string_ends_with_a_multibyte_character()
    {
        $string = new Twine\Str('宮本 茂');

        $this->assertTrue($string->endsWith('茂'));
        $this->assertFalse($string->endsWith('宮本'));
    }

    public function test_it_should_return_false_with_passing_empty_string_to_constructor()
    {
        $string = new Twine\Str('');

        $this->assertFalse($string->endsWith('john pinkerton'));
    }

    public function test_it_should_return_false_with_passing_empty_string_to_method()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertFalse($string->endsWith(''));
    }
}
