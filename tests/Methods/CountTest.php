<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class CountTest extends TestCase
{
    #[Test]
    public function it_can_count_substring_occurrences(): void
    {
        $string = new Twine\Str('How much wood could a woodchuck chuck if a woodchuck could chuck wood?');

        $count = $string->count('wood');

        $this->assertEquals(4, $count);
    }

    #[Test]
    public function it_can_count_substring_occurrences_in_a_multibyte_string(): void
    {
        $string = new Twine\Str('宮本 茂 宮本 茂 宮本');

        $count = $string->count('宮本');

        $this->assertEquals(3, $count);
    }
}
