<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class ReverseTest extends TestCase
{
    public function test_it_can_be_reversed()
    {
        $string = new Twine\Str('john pinkerton');

        $reveresed = $string->reverse();

        $this->assertInstanceOf(Twine\Str::class, $reveresed);
        $this->assertEquals('notreknip nhoj', $reveresed);
    }

    public function test_it_is_multibyte_compatible()
    {
        $string = new Twine\Str('宮本 茂');

        $reveresed = $string->reverse();

        $this->assertInstanceOf(Twine\Str::class, $reveresed);
        $this->assertEquals('茂 本宮', $reveresed);
    }
}
