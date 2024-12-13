<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class FirstTest extends TestCase
{
    #[Test]
    public function it_can_get_the_first_chunk_of_a_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $first = $string->first(4);

        $this->assertInstanceOf(Twine\Str::class, $first);
        $this->assertEquals('john', $first);
    }

    #[Test]
    public function it_can_get_the_first_chunk_of_a_multibyte_string(): void
    {
        $string = new Twine\Str('宮本 茂');

        $first = $string->first(2);

        $this->assertInstanceOf(Twine\Str::class, $first);
        $this->assertEquals('宮本', $first);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $first = $string->first(4);

        $this->assertEquals('ASCII', mb_detect_encoding($first));
    }
}
