<?php
// src/Command/UploadDataBaseCommand
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use App\Services\InitializationDatabase;

class UploadDataBaseCommand extends Command
{
    /**
     * @var UploadDataBase
     */
    private $uploadDataBase;
    public function __construct(InitializationDatabase $uploadDataBase)
    {
        $this->uploadDataBase = $uploadDataBase;
        parent::__construct();
    }
    protected function configure()
    {
        $this->setName('app:intialization-database')
            ->setDescription('We initialize the database with the minimum generic listings.');
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
         $output->writeln([
            'Initialization Data base',
            '========================',
        ]);
        $output->writeln( $this->uploadDataBase->uploadDataInitial() );
        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;
    }
}