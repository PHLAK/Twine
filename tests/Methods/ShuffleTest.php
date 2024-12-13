<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class ShuffleTest extends TestCase
{
    #[Test]
    public function it_can_be_shuffled(): void
    {
        $string = new Twine\Str('john pinkerton');

        $shuffled = $string->shuffle();

        while ($string === $shuffled) {
            $shuffled = $string->shuffle();
        }

        $this->assertInstanceOf(Twine\Str::class, $shuffled);
        $this->assertNotEquals($string, $shuffled);
        $this->assertMatchesRegularExpression('/[ ehijknoprt]{14}/', (string) $shuffled);
    }

    public function a_multibyte_string_can_be_shuffled(): void
    {
        $string = new Twine\Str('宮本 任天堂 茂');

        $shuffled = $string->shuffle();

        while ($string === $shuffled) {
            $shuffled = $string->shuffle();
        }

        $this->assertInstanceOf(Twine\Str::class, $shuffled);
        $this->assertNotEquals($string, $shuffled);
        $this->assertMatchesRegularExpression('/[ 本天任宮堂茂]{7}/', (string) $shuffled);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $shuffled = $string->shuffle();

        $this->assertEquals('ASCII', mb_detect_encoding($shuffled));
    }
}
