<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class JoinTest extends TestCase
{
    public function test_it_can_be_joined()
    {
        $first = new Twine\Str('john');
        $last = new Twine\Str('pinkerton');

        $joined = $first->join($last);

        $this->assertInstanceOf(Twine\Str::class, $joined);
        $this->assertEquals('john pinkerton', $joined);
    }

    public function test_it_can_be_joined_with_a_custom_glue()
    {
        $min = new Twine\Str('1');
        $max = new Twine\Str('100');

        $joined = $min->join($max, '-');

        $this->assertInstanceOf(Twine\Str::class, $joined);
        $this->assertEquals('1-100', $joined);
    }

    public function test_it_is_multibyte_compatible()
    {
        $first = new Twine\Str('宮本');
        $last = new Twine\Str('茂');

        $joined = $first->join($last, ' ');

        $this->assertInstanceOf(Twine\Str::class, $joined);
        $this->assertEquals('宮本 茂', $joined);
    }

    public function test_it_preserves_encoding()
    {
        $first = new Twine\Str('john', 'ASCII');
        $last = new Twine\Str('pinkerton', 'ASCII');

        $joined = $first->join($last);

        $this->assertEquals('ASCII', mb_detect_encoding($joined));
    }
}
