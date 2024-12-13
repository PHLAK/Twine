<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class MatchesTest extends TestCase
{
    #[Test]
    public function it_can_be_matched(): void
    {
        $string = new Twine\Str('john pinkerton');

        $matches = $string->matches('/[a-z]+ [a-z]+/');

        $this->assertTrue($matches);
    }

    #[Test]
    public function it_can_not_be_matched(): void
    {
        $string = new Twine\Str('john pinkerton');

        $differs = $string->matches('/[0-9]+/');

        $this->assertFalse($differs);
    }

    #[Test]
    public function it_a_multibyte_string_can_be_matched(): void
    {
        $string = new Twine\Str('宮本 茂');

        $matches = $string->matches('/[宮本茂]+ [宮本茂]+/');

        $this->assertTrue($matches);
    }
}
