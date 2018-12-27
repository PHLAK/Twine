<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;

class Bcrypt extends Benchmark
{
    /** @var int Number of iterations to be ran */
    protected $iterations = 100;

    /**
     * The Twine method benchmark.
     *
     * @param \PHLAK\Twine\Str $input
     *
     * @return void
     */
    protected function twineBenchmark(Twine\Str $input)
    {
        $input->bcrypt();
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
        password_hash($input, PASSWORD_BCRYPT);
    }
}
