<?php

namespace PHLAK\Twine\Tests\Methods;

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

    public function test_a_multibyte_string_can_be_split_into_an_array_of_words()
    {
        $string = new Twine\Str('Джон Пинкертон-звяканьеХаймер_ШмидтДжонсон');

        $words = $string->words();

        $this->assertEquals(['Джон', 'Пинкертон', 'звяканье', 'Хаймер', 'Шмидт', 'Джонсон'], $words);
        foreach ($words as $word) {
            $this->assertInstanceOf(Twine\Str::class, $word);
        }
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $words = $string->words();

        foreach ($words as $word) {
            $this->assertEquals('ASCII', mb_detect_encoding($word));
        }
    }
}
