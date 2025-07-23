<?php
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH."core/functions.php";
spl_autoload_register(function($class)
{
   $class= str_replace("\\","/",$class);
    require base("$class.php");
});
require base("core/routes.php");


// $id = $_GET["id"];

// $query ="select * from posts where id = ?";

// $posts = $db->query($query,[$id])->fetch();

//dd($posts);











// foreach ($posts as $posts) {
//     echo "<li>" . $posts["title"] . "</li>";
// }
