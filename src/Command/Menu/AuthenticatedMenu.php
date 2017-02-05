<?php
namespace BarenoteCli\Command\Menu;


class AuthenticatedMenu extends Menu
{
    /**
     * @return string
     */
    protected function getSlug()
    {
        return 'postauth';
    }
    
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
            new Choice('barenote:note:menu', 'Something with notes'),
            new Choice(null, 'Actually nothing, exit this app'),
        ];
    }
}