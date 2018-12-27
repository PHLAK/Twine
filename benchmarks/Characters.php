<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;

class Characters extends Benchmark
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
        $input->characters();
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
        preg_split('//u', $input, -1, PREG_SPLIT_NO_EMPTY);
    }
}
