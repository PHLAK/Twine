<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class InTest extends TestCase
{
    #[Test]
    public function it_can_determine_if_it_exists_in_another_string(): void
    {
        $string = new Twine\Str('pink');

        $in = $string->in('john pinkerton');

        $this->assertTrue($in);
    }

    #[Test]
    public function it_can_determine_if_it_does_not_exist_in_another_string(): void
    {
        $string = new Twine\Str('purple');

        $notIn = $string->in('john pinkerton');

        $this->assertFalse($notIn);
    }

    #[Test]
    public function it_can_determine_if_it_exists_in_another_string_case_insensitive(): void
    {
        $string = new Twine\Str('Pink');

        $in = $string->in('john pinkerton', Twine\Config\In::CASE_INSENSITIVE);

        $this->assertTrue($in);
    }

    #[Test]
    public function it_can_determine_if_a_multibyte_string_exists_in_another_string(): void
    {
        $string = new Twine\Str('任天堂');

        $in = $string->in('宮本 任天堂 茂 ');

        $this->assertTrue($in);
    }
}
