<?php
//require "routes.php";
require "functions.php";
require "Database.php";

$connect = require "connect.php";

$id = $_GET["id"];
//dd($id);    

$db = new Database($connect["database"]);
$query ="select * from posts where id = ?";
$posts = $db->query($query,[$id])->fetch();

dd($posts);
// foreach ($posts as $posts) {
//     echo "<li>" . $posts["title"] . "</li>";
// }
