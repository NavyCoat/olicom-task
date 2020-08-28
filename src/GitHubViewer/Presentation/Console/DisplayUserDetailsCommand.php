<?php


namespace App\GitHubViewer\Presentation\Console;


use App\GitHubViewer\Application\ApplicationFacade;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DisplayUserDetailsCommand extends Command
{
    private ApplicationFacade $githubViewer;

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:user-details';

    /**
     * DisplayUserDetailsCommand constructor.
     * @param ApplicationFacade $githubViewer
     */
    public function __construct(ApplicationFacade $githubViewer)
    {
        $this->githubViewer = $githubViewer;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Display GitHub user details.')
            ->addArgument('login', InputArgument::REQUIRED, 'GitHub user login.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $view = $this->githubViewer->getUserDetailsView($input->getArgument('login'));

            //todo: można by tutaj pobawić się w reprezentację danych.
            $output->write(json_encode($view));

            return Command::SUCCESS;
        } catch (\Throwable $e) {
            return Command::FAILURE;
        }
    }
}