<?php

use Classes\Database;
use Classes\ServiceContainer\App;
use Classes\ServiceContainer\Container;

$container = new Container();

$container->bind('Classes\Database', function () {

    $dsnData = require 'config.php';

    return new Database($dsnData, $_ENV['USERNAME'], $_ENV['PASSWORD']);

});

App::setContainer($container);