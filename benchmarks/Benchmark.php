<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;
use PHLAK\Twine\Benchmarks\Exceptions\BenchmarkException;
use PHLAK\Chronometer\Timer;

abstract class Benchmark
{
    /** @var int Number of iterations to be ran */
    protected $iterations = 1000;

    /** @var string A short string used for benchmark input */
    protected $shortString = 'john pinkerton';

    /** @var string A long string used for benchmark input */
    protected $longString = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis nec ipsum hendrerit ultrices. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean accumsan ac nisi sed luctus. Suspendisse interdum quam sem, ac lobortis mi varius sit amet. Maecenas sit amet john pinkerton molestie turpis. Sed pulvinar faucibus elit et varius. Aliquam dignissim erat vitae ultrices tempus. Sed nisi mauris, ornare vitae enim eu, gravida pharetra neque. Pellentesque vel turpis in tortor mattis bibendum. Donec tempor vel est ut cursus. Phasellus hendrerit semper placerat. Sed ultrices, tortor ut luctus volutpat, metus est ullamcorper sem, nec ullamcorper ante diam condimentum velit.';

    /**
     * Invoke the class as if it were a function.
     *
     * @return object
     */
    public function __invoke() : object
    {
        ini_set('opcache.enable', 0);

        return (object) [
            'method' => $this->method(),
            'iterations' => $this->iterations,
            'short_string' => (object) [
                'twine' => $this->executeTwineBenchmark($this->shortString),
                'native' => $this->executeNativeBenchmark($this->shortString)
            ],
            'long_string' => (object) [
                'twine' => $this->executeTwineBenchmark($this->longString),
                'native' => $this->executeNativeBenchmark($this->longString)
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
        $string = new Twine\Str($input);

        Timer::start($reset = true);

        for ($i = 1; $i <= $this->iterations; $i++) {
            $this->twineBenchmark($string);
        }

        Timer::stop();

        return Timer::elapsed() / $this->iterations * 1000000;
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
        Timer::start($reset = true);

        try {
            for ($i = 1; $i <= $this->iterations; $i++) {
                $this->nativeBenchmark($input);
            }
        } catch (BenchmarkException $exception) {
            return 0;
        }

        Timer::stop();

        return Timer::elapsed() / $this->iterations * 1000000;
    }

    /**
     * Get the name of the method being benchmarked.
     *
     * @return string
     */
    protected function method() : string
    {
        $parts = explode('\\', get_class($this));

        return lcfirst(array_pop($parts));
    }

    /**
     * The Twine benchmark.
     *
     * @param \PHLAK\Twine\Str $input
     *
     * @var void
     */
    abstract protected function twineBenchmark(Twine\Str $input);

    /**
     * The native PHP benchmark.
     *
     * @param string $input
     *
     * @var void
     */
    abstract protected function nativeBenchmark(string $input);
}
