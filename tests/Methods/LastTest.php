<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class LastTest extends TestCase
{
    #[Test]
    public function it_can_get_the_last_chunk_of_a_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $last = $string->last(9);

        $this->assertInstanceOf(Twine\Str::class, $last);
        $this->assertEquals('pinkerton', $last);
    }

    #[Test]
    public function it_can_get_the_last_chunk_of_a_multibyte_string(): void
    {
        $string = new Twine\Str('宮本 茂');

        $last = $string->last(3);

        $this->assertInstanceOf(Twine\Str::class, $last);
        $this->assertEquals('本 茂', $last);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $last = $string->last(9);

        $this->assertEquals('ASCII', mb_detect_encoding($last));
    }
}
