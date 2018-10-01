<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class ExplodeTest extends TestCase
{

    /**
     * @dataProvider explode_data_provider
     */
    public function test_it_splits_a_string_by_a_given_string($input, $delimiter, $limit, $expected)
    {
        $string = new Twine\Str($input);

        $parts = $string->explode($delimiter, $limit);

        $this->assertEquals($expected, $parts);
    }

    public function explode_data_provider()
    {
        return [
            'split by string' => ['john pinkerton', ' ', null, ['john', 'pinkerton']],
            'multibyte string split' => ['宮本 茂', '本 ', null, ['宮', '茂']],
            'negative limit' => ['john pinkerton', ' ', -1, ['john']],
            'positive limit' => ['1 2 3', ' ', 2, ['1', '2 3']],
            'limit 0' => ['1 2 3', ' ', 0, ['1 2 3']]
        ];
    }
}
