<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class ReplaceTest extends TestCase
{
    #[Test]
    public function it_can_replace_parts_of_the_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $replaced = $string->replace('john', 'bob', $count);

        $this->assertInstanceOf(Twine\Str::class, $replaced);
        $this->assertEquals('bob pinkerton', $replaced);
        $this->assertEquals(1, $count);
    }

    #[Test]
    public function it_can_replace_multiple_strings_at_once(): void
    {
        $string = new Twine\Str('john pinkerton');

        $replaced = $string->replace(['o', 'n'], ['a', 'm']);

        $this->assertInstanceOf(Twine\Str::class, $replaced);
        $this->assertEquals('jahm pimkertam', $replaced);
    }

    #[Test]
    public function it_is_multibyte_compatible(): void
    {
        $string = new Twine\Str('宮本 茂');

        $replaced = $string->replace('茂', '任天堂');

        $this->assertInstanceOf(Twine\Str::class, $replaced);
        $this->assertEquals('宮本 任天堂', $replaced);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $replaced = $string->replace('john', 'bob', $count);

        $this->assertEquals('ASCII', mb_detect_encoding($replaced));
    }
}
