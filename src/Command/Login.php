<?php
namespace BarenoteCli\Command;

use BarenoteCli\BarenoteApplication;
use BarenoteCli\Command\Menu\AuthenticatedMenu;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

/**
 * Class LoginCommand
 * @package BarenoteCli\Command
 * @method BarenoteApplication getApplication()
 */
class Login extends Command
{
    const KEY = 'barenote:login';

    /**
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this
            ->setName(self::KEY)
            ->setDescription('Fetches token from the API.')
            ->setHelp('This command allows you to authenticate against API...')
            ->setHidden(true);
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = $this->getApplication()->getClient();
        /** @var QuestionHelper $helper */
        $helper = $this->getHelper('question');

        $question = new Question('Please enter your username' . PHP_EOL, 'dummy');
        $question->setAutocompleterValues(['dummy']);
        $username = $helper->ask($input, $output, $question);
        
        $question = new Question('Please enter your password, I promise I won\'t do enything malicious' . PHP_EOL, 'account');
        $question->setAutocompleterValues(['account']);
        $password = $helper->ask($input, $output, $question);
        
        $client->authenticate($username, $password);

        $this->getApplication()->find(AuthenticatedMenu::KEY)->run(new ArrayInput([]), $output);
    }
}