<?php
//require "routes.php";
require "functions.php";
require "Database.php";


$db = new Database;
$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);

//dd($posts);
foreach($posts as $posts)
{
    echo "<li>" . $posts["title"] . "</li>";
}

