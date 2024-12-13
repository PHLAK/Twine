<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class NthTest extends TestCase
{
    #[Test]
    public function it_can_get_every_nth_character(): void
    {
        $string = new Twine\Str('john pinkerton');

        $nth = $string->nth(3);

        $this->assertInstanceOf(Twine\Str::class, $nth);
        $this->assertEquals('jnieo', $nth);
    }

    #[Test]
    public function it_can_get_every_nth_character_starting_at_an_offset(): void
    {
        $string = new Twine\Str('john pinkerton');

        $nth = $string->nth(3, 2);

        $this->assertInstanceOf(Twine\Str::class, $nth);
        $this->assertEquals('hpkt', $nth);
    }

    #[Test]
    public function it_can_get_every_nth_character_of_a_multibyte_string(): void
    {
        $string = new Twine\Str('宮本 任天堂 茂');

        $nth = $string->nth(3);

        $this->assertInstanceOf(Twine\Str::class, $nth);
        $this->assertEquals('宮任 ', $nth);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $nth = $string->nth(3);

        $this->assertEquals('ASCII', mb_detect_encoding($nth));
    }
}
