<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class AppendTest extends TestCase
{
    public function test_it_can_be_appended()
    {
        $string = new Twine\Str('john pinkerton');

        $appended = $string->append(' jr');

        $this->assertInstanceOf(Twine\Str::class, $appended);
        $this->assertEquals('john pinkerton jr', $appended);
    }

    public function test_it_can_be_appended_with_multiple_strings()
    {
        $first = new Twine\Str('john');
        $last = new Twine\Str('pinkerton');

        $appended = $first->append(' ', $last);

        $this->assertInstanceOf(Twine\Str::class, $appended);
        $this->assertEquals('john pinkerton', $appended);
    }

    public function test_it_is_multibyte_compatible()
    {
        $string = new Twine\Str('宮本');

        $appended = $string->append(' 茂');

        $this->assertInstanceOf(Twine\Str::class, $appended);
        $this->assertEquals('宮本 茂', $appended);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $appended = $string->append(' jr');

        $this->assertEquals('ASCII', mb_detect_encoding($appended));
    }
}
