<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;

class Append extends Benchmark
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
        $input->append('lorem', 'ipsum', 'dolor', 'sit', 'amet');
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
        $input . 'lorem' . 'ipsum' . 'dolor' . 'sit' . 'amet';
    }
}
