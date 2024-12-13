<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class JoinTest extends TestCase
{
    #[Test]
    public function it_can_be_joined(): void
    {
        $first = new Twine\Str('john');
        $last = new Twine\Str('pinkerton');

        $joined = $first->join($last);

        $this->assertInstanceOf(Twine\Str::class, $joined);
        $this->assertEquals('john pinkerton', $joined);
    }

    #[Test]
    public function it_can_be_joined_with_a_custom_glue(): void
    {
        $min = new Twine\Str('1');
        $max = new Twine\Str('100');

        $joined = $min->join($max, '-');

        $this->assertInstanceOf(Twine\Str::class, $joined);
        $this->assertEquals('1-100', $joined);
    }

    #[Test]
    public function it_is_multibyte_compatible(): void
    {
        $first = new Twine\Str('宮本');
        $last = new Twine\Str('茂');

        $joined = $first->join($last, ' ');

        $this->assertInstanceOf(Twine\Str::class, $joined);
        $this->assertEquals('宮本 茂', $joined);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $first = new Twine\Str('john', 'ASCII');
        $last = new Twine\Str('pinkerton', 'ASCII');

        $joined = $first->join($last);

        $this->assertEquals('ASCII', mb_detect_encoding($joined));
    }
}
