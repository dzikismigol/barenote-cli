<?php
namespace BarenoteCli\Command\Menu;

use BarenoteCli\Command\Login;

class UnauthenticatedMenu extends Menu
{
    const KEY = 'barenote:prelogin:menu';

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
            new Choice(Login::KEY, 'Sure, login me'),
            new Choice(null, 'Actually no, exit this app'),
        ];
    }
}