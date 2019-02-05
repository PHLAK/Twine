<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class FirstTest extends TestCase
{
    public function test_it_can_get_the_first_chunk_of_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $first = $string->first(4);

        $this->assertInstanceOf(Twine\Str::class, $first);
        $this->assertEquals('john', $first);
    }

    public function test_it_can_get_the_first_chunk_of_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $first = $string->first(2);

        $this->assertInstanceOf(Twine\Str::class, $first);
        $this->assertEquals('宮本', $first);
    }
}
