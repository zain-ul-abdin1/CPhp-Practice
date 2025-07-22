<?php
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH."core/functions.php";
require base("core/Response.php");
// require base("core/Database.php");
spl_autoload_register(function($class)
{
    require base("core/$class.php");
});
require base("routes.php");


// $id = $_GET["id"];

// $query ="select * from posts where id = ?";

// $posts = $db->query($query,[$id])->fetch();

//dd($posts);











// foreach ($posts as $posts) {
//     echo "<li>" . $posts["title"] . "</li>";
// }
