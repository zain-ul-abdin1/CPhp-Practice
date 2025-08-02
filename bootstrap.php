<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container;
$container->bind("Core\Database", function () {

    $connect = require base("connect.php");
    return new Database($connect["database"]);
});

App::setContainer($container);