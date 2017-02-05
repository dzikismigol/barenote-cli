#!/usr/bin/env php
<?php
require __DIR__ . '/vendor/autoload.php';

use BarenoteCli\BarenoteApplication as Application;
use BarenoteCli\Command\Login;
use BarenoteCli\Command\Menu\AuthenticatedMenu;
use BarenoteCli\Command\Menu\UnauthenticatedMenu;
use BarenoteCli\Command\Note\NoteList;
use BarenoteCli\Command\Note\NoteMenu;
use BarenoteCli\Command\Note\ViewOneNote;

$application = new Application('Barenote CLI', '0.1', 'http://localhost:8080');

$application->addCommands([
    new UnauthenticatedMenu(),
    new AuthenticatedMenu(),
    new Login(),
    new NoteMenu(),
    new NoteList(),
    new ViewOneNote()
]);
$application->setDefaultCommand('barenote:prelogin:menu');

$application->run();