<?php
namespace BarenoteCli\Command\Menu;


use BarenoteCli\Command\Note\NoteMenu;

class AuthenticatedMenu extends Menu
{
    const KEY = 'barenote:postlogin:menu';

    /**
     * @return string
     */
    protected function getQuestion()
    {
        return 'What do you want to do?';
    }

    /**
     * @return Choice[]
     */
    protected function getChoices()
    {
        return [
            new Choice(NoteMenu::KEY, 'Something with notes'),
            new Choice(null, 'Actually nothing, exit this app'),
        ];
    }
}