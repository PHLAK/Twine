<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class SimilarityTest extends TestCase
{
    #[Test]
    public function it_can_determine_similarity_percentage_to_another_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $similarity = $string->similarity('jim ponkerten');

        $this->assertEqualsWithDelta(66.666666666667, $similarity, 0.000000000001);
    }

    public function a_multibyte_string_can_determine_similarity_percentage_to_another_string(): void
    {
        $string = new Twine\Str('宮本 茂');

        $similarity = $string->similarity('任天堂');

        $this->assertEqualsWithDelta(21.052631578947, $similarity, 0.000000000001);
    }
}
