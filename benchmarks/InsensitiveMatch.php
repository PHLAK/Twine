<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;

class InsensitiveMatch extends Benchmark
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
        $input->insensitiveMatch('JoHN PiNKeRToN');
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
        strcasecmp($input, 'JoHN PiNKeRToN');
    }
}
