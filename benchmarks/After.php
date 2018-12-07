<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;

class After extends Benchmark
{
    /**
     * The Twine method benchmark.
     *
     * @return void
     */
    protected function twineBenchmark(string $input)
    {
        $string = Twine\Str::make($input);

        $string->after(' ');
    }

    /**
     * The native PHP benchmark.
     *
     * @return void
     */
    protected function nativeBenchmark(string $input)
    {
        mb_split(' ', $input, 2)[1];
    }
}
