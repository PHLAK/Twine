<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    public function test_it_can_get_the_first_chunk_of_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $first = $string->first(4);

        $this->assertEquals('john', $first);
    }
}
