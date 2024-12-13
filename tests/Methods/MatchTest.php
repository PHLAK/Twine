<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class MatchTest extends TestCase
{
    #[Test]
    public function it_can_find_a_match_within(): void
    {
        $string = new Twine\Str(
            'You can reach me on my cell at 123-456-7890 or at work 987-654-3210'
        );

        $match = $string->match('/(?:\d{3}-?)\d{3}-?\d{4}/');

        $this->assertInstanceOf(Twine\Str::class, $match);
        $this->assertEquals('123-456-7890', $match);
    }

    #[Test]
    public function it_is_multibyte_compatible(): void
    {
        $string = new Twine\Str(
            '123-456-7890または職場987-654-3210の私の携帯で連絡できます'
        );

        $match = $string->match('/(?:\d{3}-?)\d{3}-?\d{4}/');

        $this->assertInstanceOf(Twine\Str::class, $match);
        $this->assertEquals('123-456-7890', $match);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str(
            'You can reach me on my cell at 123-456-7890 or at work 987-654-3210',
            'ASCII'
        );

        $match = $string->match('/(?:\d{3}-?)\d{3}-?\d{4}/');

        $this->assertEquals('ASCII', mb_detect_encoding($match));
    }
}
