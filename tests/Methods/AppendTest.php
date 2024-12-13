<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class AppendTest extends TestCase
{
    #[Test]
    public function it_can_be_appended(): void
    {
        $string = new Twine\Str('john pinkerton');

        $appended = $string->append(' jr');

        $this->assertInstanceOf(Twine\Str::class, $appended);
        $this->assertEquals('john pinkerton jr', $appended);
    }

    #[Test]
    public function it_can_be_appended_with_multiple_strings(): void
    {
        $first = new Twine\Str('john');
        $last = new Twine\Str('pinkerton');

        $appended = $first->append(' ', $last);

        $this->assertInstanceOf(Twine\Str::class, $appended);
        $this->assertEquals('john pinkerton', $appended);
    }

    #[Test]
    public function it_is_multibyte_compatible(): void
    {
        $string = new Twine\Str('宮本');

        $appended = $string->append(' 茂');

        $this->assertInstanceOf(Twine\Str::class, $appended);
        $this->assertEquals('宮本 茂', $appended);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $appended = $string->append(' jr');

        $this->assertEquals('ASCII', mb_detect_encoding($appended));
    }
}
