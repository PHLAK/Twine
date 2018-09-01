<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class StartsWith extends TestCase
{
    public function test_it_can_determine_if_it_starts_with_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue($string->startsWith('john'));
        $this->assertFalse($string->startsWith('pinkerton'));
    }

    public function test_it_can_determine_if_a_multibyte_string_starts_with_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $this->assertTrue($string->startsWith('宮本'));
        $this->assertFalse($string->startsWith('茂'));
    }
}
