<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class MatchAllTest extends TestCase
{
    public function test_it_can_find_all_matches_within()
    {
        $string = new Twine\Str(
            'You can reach me on my cell at 123-456-7890 or at work 987-654-3210'
        );

        $matches = $string->matchAll('/(?:\d{3}-?)\d{3}-?\d{4}/');

        $this->assertEquals(['123-456-7890', '987-654-3210'], $matches);
        foreach ($matches as $match) {
            $this->assertInstanceOf(Twine\Str::class, $match);
        }
    }

    public function test_it_is_multibyte_compatible()
    {
        $string = new Twine\Str(
            '123-456-7890または職場987-654-3210の私の携帯で連絡できます'
        );

        $matches = $string->matchAll('/(?:\d{3}-?)\d{3}-?\d{4}/');

        $this->assertEquals(['123-456-7890', '987-654-3210'], $matches);
        foreach ($matches as $match) {
            $this->assertInstanceOf(Twine\Str::class, $match);
        }
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str(
            'You can reach me on my cell at 123-456-7890 or at work 987-654-3210',
            'ASCII'
        );

        $matches = $string->matchAll('/(?:\d{3}-?)\d{3}-?\d{4}/');

        foreach ($matches as $match) {
            $this->assertAttributeEquals('ASCII', 'encoding', $match);
        }
    }
}
