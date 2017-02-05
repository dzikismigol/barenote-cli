<?php
namespace BarenoteCli\Command\Note;

use Barenote\Domain\Identity\NoteId;
use BarenoteCli\BarenoteApplication;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

/**
 * Class ViewOneNote
 * @package BarenoteCli\Command\Note
 * @method BarenoteApplication getApplication()
 */
class ViewOneNote extends Command
{
    protected function configure()
    {
        $this
            ->setName('barenote:note:one')
            ->setDescription('Detailed information about one of your notes')
            ->setHelp('Help for command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = $this->getApplication()->getClient();
        /** @var QuestionHelper $helper */
        $helper = $this->getHelper('question');

        $question = new Question('Please provide ID of the note you would like to read' . PHP_EOL, '1');
        $question->setAutocompleterValues(['1']);
        $id   = $helper->ask($input, $output, $question);
        $note = $client->getNotesEndpoint()->getOne(new NoteId((int)$id));

        $output->writeln("<info>ID:</info>" . PHP_EOL . $note->getId()->getValue());
        $output->writeln("<info>Title:</info>" . PHP_EOL . $note->getTitle());
        $output->writeln("<info>Content:</info>" . PHP_EOL . $note->getContent());

        $question = new ConfirmationQuestion('Do you want to exit the app? (y/N)' . PHP_EOL, false);

        if ($helper->ask($input, $output, $question)) {
            exit(0);
        }
    }
}