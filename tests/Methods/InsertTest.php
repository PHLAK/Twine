<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class InsertTest extends TestCase
{
    #[Test]
    public function it_can_be_inserted(): void
    {
        $string = new Twine\Str('john pinkerton');

        $inserted = $string->insert('athan', 4);

        $this->assertInstanceOf(Twine\Str::class, $inserted);
        $this->assertEquals('johnathan pinkerton', $inserted);
    }

    #[Test]
    public function it_is_multibyte_compatible(): void
    {
        $string = new Twine\Str('宮本 茂');

        $inserted = $string->insert('任天堂 ', 3);

        $this->assertInstanceOf(Twine\Str::class, $inserted);
        $this->assertEquals('宮本 任天堂 茂', $inserted);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $inserted = $string->insert('athan', 4);

        $this->assertEquals('ASCII', mb_detect_encoding($inserted));
    }
}
