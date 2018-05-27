<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class ComparableTest extends TestCase
{
    public function test_it_can_determine_if_it_starts_with_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue($string->startsWith('john'));
        $this->assertFalse($string->startsWith('pinkerton'));
    }

    public function test_it_can_determine_if_it_ends_with_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue($string->endsWith('pinkerton'));
        $this->assertFalse($string->endsWith('john'));
    }

    public function test_it_can_determine_if_it_contains_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue($string->contains('pink'));
        $this->assertFalse($string->contains('purple'));
    }

}
