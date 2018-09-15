<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class MatchesTest extends TestCase
{
    public function test_it_can_be_matched()
    {
        $string = new Twine\Str('john pinkerton');

        $matches = $string->matches('/[a-z]+ [a-z]+/');

        $this->assertTrue($matches);
    }

    public function test_it_a_multibyte_string_can_be_matched()
    {
        $string = new Twine\Str('宮本 茂');

        $matches = $string->matches('/[宮本茂]+ [宮本茂]+/');

        $this->assertTrue($matches);
    }
}
