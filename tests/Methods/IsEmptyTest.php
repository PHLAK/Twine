<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class IsEmptyTest extends TestCase
{
    #[Test]
    public function it_can_determine_if_it_is_empty(): void
    {
        $string = new Twine\Str('');

        $empty = $string->isEmpty();

        $this->assertTrue($empty);
    }

    #[Test]
    public function it_can_determine_if_it_is_not_empty(): void
    {
        $string = new Twine\Str('john pinkerton');

        $notEmpty = $string->isEmpty();

        $this->assertFalse($notEmpty);
    }

    #[Test]
    public function it_can_determine_if_a_multibyte_string_is_not_empty(): void
    {
        $string = new Twine\Str('宮本 茂');

        $notEmpty = $string->isEmpty();

        $this->assertFalse($notEmpty);
    }
}
