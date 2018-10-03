<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class WordsTest extends TestCase
{
    public function test_it_can_be_split_into_an_array_of_words()
    {
        $string = new Twine\Str('john pinkerton-jingleHeimer_ShmidtJohnson');

        $words = $string->words();

        $this->assertEquals(['john', 'pinkerton', 'jingle', 'Heimer', 'Shmidt', 'Johnson'], $words);
        foreach ($words as $word) {
            $this->assertInstanceOf(Twine\Str::class, $word);
        }
    }
}
