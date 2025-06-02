<?php
//require "routes.php";
require "functions.php";
require "Database.php";
$connect = require "connect.php";
$db = new Database($connect["database"]);
$posts = $db->query("select * from posts")->fetchAll();

//dd($posts);
foreach ($posts as $posts) {
    echo "<li>" . $posts["title"] . "</li>";
}
