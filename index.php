<?php
require "Response.php";
require "Database.php";
require "routes.php";
require "functions.php";


$id = $_GET["id"];

$query ="select * from posts where id = ?";

$posts = $db->query($query,[$id])->fetch();

//dd($posts);











// foreach ($posts as $posts) {
//     echo "<li>" . $posts["title"] . "</li>";
// }
