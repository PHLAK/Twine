<?php

namespace PHLAK\Twine\Benchmarks\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use LucidFrame\Console\ConsoleTable;
use FilesystemIterator;

class RunOne extends Command
{
    /** @var \LucidFrame\Console\ConsoleTable The table containing the output data. */
    protected $outputTable;

    /**
     * Configures the current command.
     *
     * @return void
     */
    public function configure()
    {
        $this->setName('run:one');
        $this->setDescription('Runs a single benchmark');
        $this->addArgument('filepath', InputArgument::REQUIRED, 'The path to the benchmark class you wish to run.');
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
        $fileName = basename($input->getArgument('filepath'), '.php');
        $className = "PHLAK\\Twine\\Benchmarks\\{$fileName}";
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

        $output->write($this->table->display());
    }
}
