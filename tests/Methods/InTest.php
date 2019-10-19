<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class InTest extends TestCase
{
    public function test_it_can_determine_if_it_exists_in_another_string()
    {
        $string = new Twine\Str('pink');

        $in = $string->in('john pinkerton');

        $this->assertTrue($in);
    }

    public function test_it_can_determine_if_it_does_not_exist_in_another_string()
    {
        $string = new Twine\Str('purple');

        $notIn = $string->in('john pinkerton');

        $this->assertFalse($notIn);
    }

    public function test_it_can_determine_if_it_exists_in_another_string_case_insensitive()
    {
        $string = new Twine\Str('Pink');

        $in = $string->in('john pinkerton', Twine\Config\In::CASE_INSENSITIVE);

        $this->assertTrue($in);
    }

    public function test_it_can_determine_if_a_multibyte_string_exists_in_another_string()
    {
        $string = new Twine\Str('任天堂');

        $in = $string->in('宮本 任天堂 茂 ');

        $this->assertTrue($in);
    }
}
