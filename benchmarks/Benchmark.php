<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Chronometer\Timer;

abstract class Benchmark
{
    /** @var int Number of iterations to be ran */
    protected $iterations = 100000;

    /** @var string A short string used for benchmark input */
    protected $shortString = 'john pinkerton';

    /** @var string A long string used for benchmark input */
    protected $longString = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis nec ipsum hendrerit ultrices. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean accumsan ac nisi sed luctus. Suspendisse interdum quam sem, ac lobortis mi varius sit amet. Maecenas sit amet molestie turpis. Sed pulvinar faucibus elit et varius. Aliquam dignissim erat vitae ultrices tempus. Sed nisi mauris, ornare vitae enim eu, gravida pharetra neque. Pellentesque vel turpis in tortor mattis bibendum. Donec tempor vel est ut cursus. Phasellus hendrerit semper placerat. Sed ultrices, tortor ut luctus volutpat, metus est ullamcorper sem, nec ullamcorper ante diam condimentum velit.';

    /**
     * Invoke the class as if it were a function.
     *
     * @return object
     */
    public function __invoke() : object
    {
        return (object) [
            'title' => get_class($this),
            'iterations' => $this->iterations,
            'twine' => (object) [
                'short_string' => $this->executeTwineBenchmark($this->shortString),
                'long_string' => $this->executeTwineBenchmark($this->longString)
            ],
            'native' => (object) [
                'short_string' => $this->executeNativeBenchmark($this->shortString),
                'long_string' => $this->executeNativeBenchmark($this->longString)
            ]
        ];
    }

    /**
     * Set the iterations.
     *
     * @param int $iterations The number of iterations
     *
     * @return self
     */
    public function setIterations(int $iterations)
    {
        $this->iterations = $iterations;

        return $this;
    }

    /**
     * Run the Twine method benchmark.
     *
     * @param string $input The benchmark input string
     *
     * @var float
     */
    public function executeTwineBenchmark(string $input) : float
    {
        Timer::reset();
        Timer::start();

        for ($i = 1; $i <= $this->iterations; $i++) {
            $this->twineBenchmark($input);
        }

        Timer::stop();

        return Timer::elapsed();
    }

    /**
     * Run the native PHP benchmark.
     *
     * @param string $input The benchmark input string
     *
     * @return float
     */
    public function executeNativeBenchmark(string $input) : float
    {
        Timer::reset();
        Timer::start();

        for ($i = 1; $i <= $this->iterations; $i++) {
            $this->nativeBenchmark($input);
        }

        Timer::stop();

        return Timer::elapsed();
    }

    /**
     * The Twine benchmark;
     *
     * @var void
     */
    abstract protected function twineBenchmark(string $input);

    /**
     * The native PHP benchmark.
     *
     * @var void
     */
    abstract protected function nativeBenchmark(string $input);
}
