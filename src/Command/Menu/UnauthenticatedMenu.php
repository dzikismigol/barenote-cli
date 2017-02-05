<?php
namespace BarenoteCli\Command\Menu;

class UnauthenticatedMenu extends Menu
{
    
    /**
     * @return string
     */
    protected function getSlug()
    {
        return 'prelogin';
    }
    
    /**
     * @return string
     */
    protected function getQuestion()
    {
        return 'Do you want to login?';
    }
    
    /**
     * @return Choice[]
     */
    protected function getChoices()
    {
        return [
            new Choice('barenote:login', 'Sure, login me'),
            new Choice(null, 'Actually no, exit this app'),
        ];
    }
}