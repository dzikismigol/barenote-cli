<?php
namespace BarenoteCli\Command\Note;

use BarenoteCli\Command\Menu\Choice;
use BarenoteCli\Command\Menu\Menu;

class NoteMenu extends Menu
{
    const KEY = 'barenote:note:menu';

    protected function getQuestion()
    {
        return 'What do you want to do with your notes?';
    }
    
    protected function getChoices()
    {
        return [
            new Choice(NoteList::KEY, 'view list'),
            new Choice(ViewOneNote::KEY, 'view one'),
            new Choice('barenote:note:create', 'create new'),
            new Choice(null, 'exit this menu'),
        ];
    }
    
}