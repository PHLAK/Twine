<?php

namespace PHLAK\Twine\Tests\Support;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class StrTest extends TestCase
{
    public function test_it_can_split_a_string_into_an_array_of_characters()
    {
        $characters = Twine\Support\Str::characters('john pinkerton');

        $this->assertEquals(['j', 'o', 'h', 'n', ' ', 'p', 'i', 'n', 'k', 'e', 'r', 't', 'o', 'n'], $characters);
    }

    public function test_it_can_split_a_multibyte_string_into_an_array_of_characters()
    {
        $characters = Twine\Support\Str::characters('宮本 茂');

        $this->assertEquals(['宮', '本', ' ', '茂'], $characters);
    }

    public function test_it_can_split_a_string_into_an_array_of_words()
    {
        $words = Twine\Support\Str::words('john pinkerton-jingleHeimer_ShmidtJohnson');

        $this->assertEquals(['john', 'pinkerton', 'jingle', 'Heimer', 'Shmidt', 'Johnson'], $words);
    }

    public function test_a_multibyte_string_can_be_split_into_an_array_of_words()
    {
        $words = Twine\Support\Str::words('Джон Пинкертон-звяканьеХаймер_ШмидтДжонсон');

        $this->assertEquals(['Джон', 'Пинкертон', 'звяканье', 'Хаймер', 'Шмидт', 'Джонсон'], $words);
    }
}
