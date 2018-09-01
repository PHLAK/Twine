<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class WrapSoftTest extends TestCase
{
    public function test_it_can_be_soft_wrapped()
    {
        $string = new Twine\Str('john pinkerton');

        $wrappedSoft = $string->wrap(5, "\n", Twine\Config\Wrap::SOFT);
        $alias = $string->wrapSoft(5);

        $this->assertEquals($wrappedSoft, $alias);
    }
}
