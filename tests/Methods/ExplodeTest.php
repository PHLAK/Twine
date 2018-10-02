<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class ExplodeTest extends TestCase
{
    public function test_it_can_be_exploded()
    {
        $string = new Twine\Str('john pinkerton');

        $exploded = $string->explode(' ');

        $this->assertCount(2, $exploded);
        $this->assertEquals('john', $exploded[0]);
        $this->assertEquals('pinkerton', $exploded[1]);
    }

    public function test_it_can_be_exploded_with_a_limit()
    {
        $string = new Twine\Str('john maurice mcclean pinkerton');

        $exploded = $string->explode(' ', 3);

        $this->assertCount(3, $exploded);
        $this->assertEquals('john', $exploded[0]);
        $this->assertEquals('maurice', $exploded[1]);
        $this->assertEquals('mcclean pinkerton', $exploded[2]);
    }
}
