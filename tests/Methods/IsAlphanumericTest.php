<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class IsAlphanumericTest extends TestCase
{
    public function test_it_can_determine_if_the_string_is_alphanumeric()
    {
        $string = new Twine\Str('JohnPinkerton123');

        $alphanumeric = $string->isAlphanumeric();

        $this->assertTrue($alphanumeric);
    }

    public function test_it_can_determine_if_the_string_is_not_alphanumeric()
    {
        $string = new Twine\Str('john pinkerton');

        $notAlphanumeric = $string->isAlphanumeric();

        $this->assertFalse($notAlphanumeric);
    }

    public function test_it_can_determine_if_a_multibyte_string_is_alphanumeric()
    {
        $string = new Twine\Str('任天堂');

        $alphanumeric = $string->isAlphanumeric();

        $this->assertFalse($alphanumeric);
    }
}
