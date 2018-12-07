<?php

namespace PHLAK\Twine\Benchmarks\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use FilesystemIterator;

class RunAll extends Command
{
    /**
     * Configures the current command.
     *
     * @return void
     */
    public function configure()
    {
        $this->setName('run:all');
        $this->setDescription('Runs the full benchmark suite');
    }

    /**
     * Executes the current command.
     *
     * @return int|null null or 0 if everything went fine, or an error code
     *
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $files = new FilesystemIterator(__DIR__ . '/../', FilesystemIterator::SKIP_DOTS);

        foreach ($files as $file) {
            if ($file->isDir() || $file->getBaseName() == 'Benchmark.php') {
                continue;
            }

            $class = "PHLAK\\Twine\\Benchmarks\\{$file->getBasename('.php')}";
            $benchmark = call_user_func(new $class);

            $output->writeln($benchmark->title);
            dump($benchmark);
        }
    }
}
