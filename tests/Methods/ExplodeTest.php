<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class ExplodeTest extends TestCase
{
    public function test_it_can_be_exploded()
    {
        $string = new Twine\Str('john pinkerton');

        $exploded = $string->explode(' ');

        $this->assertEquals(['john', 'pinkerton'], $exploded);
        foreach ($exploded as $substring) {
            $this->assertInstanceOf(Twine\Str::class, $substring);
        }
    }

    public function test_it_can_be_exploded_with_a_limit()
    {
        $string = new Twine\Str('john maurice mcclean pinkerton');

        $exploded = $string->explode(' ', 3);

        $this->assertEquals(['john', 'maurice', 'mcclean pinkerton'], $exploded);
        foreach ($exploded as $substring) {
            $this->assertInstanceOf(Twine\Str::class, $substring);
        }
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $exploded = $string->explode(' ');

        foreach ($exploded as $string) {
            $this->assertEquals('ASCII', mb_detect_encoding($string));
        }
    }
}
