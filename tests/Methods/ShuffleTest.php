<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class ShuffleTest extends TestCase
{
    public function test_it_can_be_shuffled()
    {
        $string = new Twine\Str('john pinkerton');

        $shuffled = $string->shuffle();

        while ($string === $shuffled) {
            $shuffled = $string->shuffle();
        }

        $this->assertInstanceOf(Twine\Str::class, $shuffled);
        $this->assertNotEquals($string, $shuffled);
        $this->assertRegExp('/[ ehijknoprt]{14}/', (string) $shuffled);
    }

    // TODO:  public function test_it_is_multibyte_compatible()
}
