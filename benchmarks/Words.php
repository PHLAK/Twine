<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;

class Words extends Benchmark
{
    /**
     * The Twine method benchmark.
     *
     * @param \PHLAK\Twine\Str $input
     *
     * @return void
     */
    protected function twineBenchmark(Twine\Str $input)
    {
        $input->words();
    }

    /**
     * The native PHP benchmark.
     *
     * @param string $input
     *
     * @return void
     */
    protected function nativeBenchmark(string $input)
    {
        preg_match_all('/\p{Lu}?[\p{Ll}0-9]+/u', $input, $matches);

        $matches[0];
    }
}
