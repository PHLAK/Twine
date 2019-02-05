<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Tests\TestCase;

class SimilarityTest extends TestCase
{
    public function test_it_can_determine_similarity_percentage_to_another_string()
    {
        $string = new Twine\Str('john pinkerton');

        $similarity = $string->similarity('jim ponkerten');

        $this->assertEquals(66.666666666667, $similarity);
    }

    public function test_a_multibyte_string_can_determine_similarity_percentage_to_another_string()
    {
        $string = new Twine\Str('宮本 茂');

        $similarity = $string->similarity('任天堂');

        $this->assertEquals(21.052631578947, $similarity);
    }
}
