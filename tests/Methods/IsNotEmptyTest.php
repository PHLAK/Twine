<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class IsNotEmptyTest extends TestCase
{
    public function test_it_can_determine_if_it_is_not_empty()
    {
        $string = new Twine\Str('');

        $notNotEmpty = $string->isNotEmpty();

        $this->assertFalse($notNotEmpty);
    }

    public function test_it_can_determine_if_it_is_not_not_empty()
    {
        $string = new Twine\Str('john pinkerton');

        $notEmpty = $string->isNotEmpty();

        $this->assertTrue($notEmpty);
    }

    public function test_it_can_determine_if_a_multibyte_string_is_not_not_empty()
    {
        $string = new Twine\Str('宮本 茂');

        $notEmpty = $string->isNotEmpty();

        $this->assertTrue($notEmpty);
    }
}
