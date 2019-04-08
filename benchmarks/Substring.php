<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;

class Substring extends Benchmark
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
        $input->substring(5, 4);
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
        mb_substr($input, 5, 4);
    }
}
