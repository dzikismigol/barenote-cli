<?php
namespace BarenoteCli\Command;

use Barenote\BarenoteClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class LoginCommand
 * @package BarenoteCli\Command
 */
class LoginCommand extends Command
{
    /**
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName('barenote:login')
            ->setDescription('Fetches token from the API.')
            ->addArgument('username', InputArgument::REQUIRED, 'Your login')
            ->addArgument('password', InputArgument::REQUIRED, 'Your password')
            ->setHelp('This command allows you to authenticate against API...');
    }
    
    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');
        $client = new BarenoteClient('http://localhost:8080');
        $client->authenticate($username, $password);
        $client->getNotesEndpoint()->getAll();
    }
}