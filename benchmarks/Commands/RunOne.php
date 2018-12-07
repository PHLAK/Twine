<?php

namespace PHLAK\Twine\Benchmarks\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use FilesystemIterator;

class RunOne extends Command
{
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
        $className = basename($input->getArgument('filepath'), '.php');
        $class = "PHLAK\\Twine\\Benchmarks\\{$className}";
        $benchmark = call_user_func(new $class);

        $output->writeln($benchmark->title);
        dump($benchmark);
    }
}
