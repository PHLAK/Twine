<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class IsEmptyTest extends TestCase
{
    public function test_it_can_determine_if_it_is_empty()
    {
        $string = new Twine\Str('');

        $empty = $string->isEmpty();

        $this->assertTrue($empty);
    }

    public function test_it_can_determine_if_it_is_not_empty()
    {
        $string = new Twine\Str('john pinkerton');

        $notEmpty = $string->isEmpty();

        $this->assertFalse($notEmpty);
    }

    public function test_it_can_determine_if_a_multibyte_string_is_not_empty()
    {
        $string = new Twine\Str('宮本 茂');

        $notEmpty = $string->isEmpty();

        $this->assertFalse($notEmpty);
    }
}
