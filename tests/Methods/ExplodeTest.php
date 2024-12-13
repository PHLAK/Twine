<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class ExplodeTest extends TestCase
{
    #[Test]
    public function it_can_be_exploded(): void
    {
        $string = new Twine\Str('john pinkerton');

        $exploded = $string->explode(' ');

        $this->assertEquals(['john', 'pinkerton'], $exploded);
        foreach ($exploded as $substring) {
            $this->assertInstanceOf(Twine\Str::class, $substring);
        }
    }

    #[Test]
    public function it_can_be_exploded_with_a_limit(): void
    {
        $string = new Twine\Str('john maurice mcclean pinkerton');

        $exploded = $string->explode(' ', 3);

        $this->assertEquals(['john', 'maurice', 'mcclean pinkerton'], $exploded);
        foreach ($exploded as $substring) {
            $this->assertInstanceOf(Twine\Str::class, $substring);
        }
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $exploded = $string->explode(' ');

        foreach ($exploded as $string) {
            $this->assertEquals('ASCII', mb_detect_encoding($string));
        }
    }
}
