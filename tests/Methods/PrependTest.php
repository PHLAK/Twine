<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class PrependTest extends TestCase
{
    public function test_it_can_be_prepended()
    {
        $string = new Twine\Str('john pinkerton');

        $prepended = $string->prepend('mr ');

        $this->assertInstanceOf(Twine\Str::class, $prepended);
        $this->assertEquals('mr john pinkerton', $prepended);
    }

    public function test_it_can_be_prepended_with_multiple_strings()
    {
        $first = new Twine\Str('john');
        $last = new Twine\Str('pinkerton');

        $prepended = $last->prepend($first, ' ');

        $this->assertInstanceOf(Twine\Str::class, $prepended);
        $this->assertEquals('john pinkerton', $prepended);
    }

    public function test_it_is_multibyte_compatible()
    {
        $first = new Twine\Str('茂');

        $prepended = $first->prepend('宮本 ');

        $this->assertInstanceOf(Twine\Str::class, $prepended);
        $this->assertEquals('宮本 茂', $prepended);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $prepended = $string->prepend('mr ');

        $this->assertEquals('ASCII', mb_detect_encoding($prepended));
    }
}
