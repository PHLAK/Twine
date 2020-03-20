<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class MatchTest extends TestCase
{
    public function test_it_can_find_a_match_within()
    {
        $string = new Twine\Str(
            'You can reach me on my cell at 123-456-7890 or at work 987-654-3210'
        );

        $match = $string->match('/(?:\d{3}-?)\d{3}-?\d{4}/');

        $this->assertInstanceOf(Twine\Str::class, $match);
        $this->assertEquals('123-456-7890', $match);
    }

    public function test_it_is_multibyte_compatible()
    {
        $string = new Twine\Str(
            '123-456-7890または職場987-654-3210の私の携帯で連絡できます'
        );

        $match = $string->match('/(?:\d{3}-?)\d{3}-?\d{4}/');

        $this->assertInstanceOf(Twine\Str::class, $match);
        $this->assertEquals('123-456-7890', $match);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str(
            'You can reach me on my cell at 123-456-7890 or at work 987-654-3210',
            'ASCII'
        );

        $match = $string->match('/(?:\d{3}-?)\d{3}-?\d{4}/');

        $this->assertEquals('ASCII', mb_detect_encoding($match));
    }
}
