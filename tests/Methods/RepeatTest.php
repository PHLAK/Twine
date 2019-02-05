<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class RepeatTest extends TestCase
{
    public function test_it_can_be_repeated()
    {
        $string = new Twine\Str('john pinkerton');

        $repeated = $string->repeat(2);

        $this->assertInstanceOf(Twine\Str::class, $repeated);
        $this->assertEquals('john pinkertonjohn pinkerton', $repeated);
    }

    public function test_it_can_be_repeated_with_glue()
    {
        $string = new Twine\Str('beetlejuice');

        $repeated = $string->repeat(3, ' ');

        $this->assertInstanceOf(Twine\Str::class, $repeated);
        $this->assertEquals('beetlejuice beetlejuice beetlejuice', $repeated);
    }

    public function test_it_is_multibyte_compatible()
    {
        $string = new Twine\Str('宮本');

        $repeated = $string->repeat(3, ' 茂 ');

        $this->assertInstanceOf(Twine\Str::class, $repeated);
        $this->assertEquals('宮本 茂 宮本 茂 宮本', $repeated);
    }
}
