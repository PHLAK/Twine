<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;
use PHLAK\Twine\Benchmarks\Exceptions\BenchmarkException;

class Chunk extends Benchmark
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
        $input->chunk(5);
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
        throw new BenchmarkException('No equivilent native method availabe');
    }
}
