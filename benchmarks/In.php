<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;

class In extends Benchmark
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
        $input->in('My name is john pinkerton jingleheimer schmit.');
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
        mb_strpos('My name is john pinkerton jingleheimer schmit.', $input);
    }
}
