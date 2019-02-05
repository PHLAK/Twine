<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class IsAlphabeticTest extends TestCase
{
    public function test_it_can_determine_if_the_string_is_alphabetic()
    {
        $string = new Twine\Str('JohnPinkerton');

        $alphabetic = $string->isAlphabetic();

        $this->assertTrue($alphabetic);
    }

    public function test_it_can_determine_if_the_string_is_not_alphabetic()
    {
        $string = new Twine\Str('john pinkerton');

        $notAlphabetic = $string->isAlphabetic();

        $this->assertFalse($notAlphabetic);
    }

    public function test_it_can_determine_if_a_multibyte_string_is_alphabetic()
    {
        $string = new Twine\Str('任天堂');

        $alphabetic = $string->isAlphabetic();

        $this->assertFalse($alphabetic);
    }
}
