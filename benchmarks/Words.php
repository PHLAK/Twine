<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;

class Words extends Benchmark
{
    /**
     * The Twine method benchmark.
     *
     * @return void
     */
    protected function twineBenchmark(string $input)
    {
        $string = Twine\Str::make($input);

        $string->words();
    }

    /**
     * The native PHP benchmark.
     *
     * @return void
     */
    protected function nativeBenchmark(string $input)
    {
        preg_match_all('/\p{Lu}?[\p{Ll}0-9]+/u', $input, $matches);

        $matches[0];
    }
}
