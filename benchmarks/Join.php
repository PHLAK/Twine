<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;

class Join extends Benchmark
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
        $input->join('jingleheimer schmit', ' : ');
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
        $input . ' : ' . 'jingleheimer schmit';
    }
}
