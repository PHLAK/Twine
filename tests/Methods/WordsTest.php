<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class WordsTest extends TestCase
{
    #[Test]
    public function it_can_be_split_into_an_array_of_words(): void
    {
        $string = new Twine\Str('john pinkerton-jingleHeimer_ShmidtJohnson');

        $words = $string->words();

        $this->assertEquals(['john', 'pinkerton', 'jingle', 'Heimer', 'Shmidt', 'Johnson'], $words);
        foreach ($words as $word) {
            $this->assertInstanceOf(Twine\Str::class, $word);
        }
    }

    public function a_multibyte_string_can_be_split_into_an_array_of_words(): void
    {
        $string = new Twine\Str('Джон Пинкертон-звяканьеХаймер_ШмидтДжонсон');

        $words = $string->words();

        $this->assertEquals(['Джон', 'Пинкертон', 'звяканье', 'Хаймер', 'Шмидт', 'Джонсон'], $words);
        foreach ($words as $word) {
            $this->assertInstanceOf(Twine\Str::class, $word);
        }
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $words = $string->words();

        foreach ($words as $word) {
            $this->assertEquals('ASCII', mb_detect_encoding($word));
        }
    }
}
