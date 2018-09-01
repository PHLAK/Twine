<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class InsertTest extends TestCase
{
    public function test_it_can_be_inserted()
    {
        $string = new Twine\Str('john pinkerton');

        $inserted = $string->insert('athan', 4);

        $this->assertInstanceOf(Twine\Str::class, $inserted);
        $this->assertEquals('johnathan pinkerton', $inserted);
    }

    public function test_it_is_multibyte_compatible()
    {
        $string = new Twine\Str('宮本 茂');

        $inserted = $string->insert('任天堂 ', 3);

        $this->assertInstanceOf(Twine\Str::class, $inserted);
        $this->assertEquals('宮本 任天堂 茂', $inserted);
    }
}
