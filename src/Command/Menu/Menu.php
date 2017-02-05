<?php
namespace BarenoteCli\Command\Menu;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\CommandNotFoundException;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

abstract class Menu extends Command
{
    const KEY = '';

    protected function configure()
    {
        $this
            ->setName(static::KEY)
            ->setDescription("Menu for {static::KEY} endpoint")
            ->setHelp('Some basic menu help');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var QuestionHelper $helper $helper */
        $helper = $this->getHelper('question');
        $question = new ChoiceQuestion(
            $this->getQuestion(),
            $this->getChoiceNames(),
            0
        );
        $question->setErrorMessage('Action %s is invalid.');
        
        while (true) {
            $choice = $helper->ask($input, $output, $question);
            $command = $this->getCommandForChoice($choice);
            if ($command === null) {
                return 0;
            } else {
                $command = $this->getApplication()->find($command);
                
                $command->run(new ArrayInput([]), $output);
            }
        }
        
        return 0;
    }
    
    /**
     * @return string
     */
    protected abstract function getQuestion();
    
    /**
     * @return Choice[]
     */
    protected abstract function getChoices();
    
    /**
     * @return string[]
     */
    private function getChoiceNames()
    {
        $names = [];
        foreach ($this->getChoices() as $choice) {
            $names[] = $choice->getOption();
        }
        return $names;
    }
    
    private function getCommandForChoice(string $option)
    {
        foreach ($this->getChoices() as $choice) {
            if ($choice->getOption() === $option) {
                return $choice->getCommand();
            }
        }
        throw new CommandNotFoundException("Command for $option not found");
    }
}