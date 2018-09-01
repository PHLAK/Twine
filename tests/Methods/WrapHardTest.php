<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class WrapHardTest extends TestCase
{
    public function test_it_can_be_hard_wrapped()
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedHard = $string->wrap(5, "\n", Twine\Config\Wrap::HARD);
        $alias = $string->wrapHard(5);

        $this->assertEquals($wrappedHard, $alias);
    }
}
