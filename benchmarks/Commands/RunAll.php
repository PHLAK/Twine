<?php

namespace PHLAK\Twine\Benchmarks\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use LucidFrame\Console\ConsoleTable;
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
        $this->addOption('iterations', 'i', InputOption::VALUE_REQUIRED, 'The number of benchmark iterations to be run');

        $this->table = new ConsoleTable();
        $this->table->setHeaders(['Method', 'Short Twine', 'Short Native', 'Long Twine', 'Long Native']);
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

            $className = "PHLAK\\Twine\\Benchmarks\\{$file->getBasename('.php')}";
            $class = new $className;
            if (! empty($input->getOption('iterations'))) {
                $class->setIterations((int) $input->getOption('iterations'));
            }

            $benchmark = $class();

            $this->table->addRow([
                $benchmark->method,
                $benchmark->short_string->twine,
                $benchmark->short_string->native,
                $benchmark->long_string->twine,
                $benchmark->long_string->native,
            ]);
        }

        $output->write($this->table->display());
    }
}
