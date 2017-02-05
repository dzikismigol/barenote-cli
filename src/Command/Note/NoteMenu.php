<?php
namespace BarenoteCli\Command\Note;


use BarenoteCli\Command\Menu\Choice;
use BarenoteCli\Command\Menu\Menu;

class NoteMenu extends Menu
{
    protected function getSlug()
    {
        return 'note';
    }
    
    protected function getQuestion()
    {
        return 'What do you want to do with your notes?';
    }
    
    protected function getChoices()
    {
        return [
            new Choice('barenote:note:list', 'view list'),
            new Choice('barenote:note:one', 'view one'),
            new Choice('barenote:note:create', 'create new'),
            new Choice(null, 'exit this menu'),
        ];
    }
    
}