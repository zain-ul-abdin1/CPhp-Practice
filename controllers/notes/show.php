<?php
use Core\Database;
$connect = require base("connect.php");
$db = new Database($connect["database"]);
$heading = "My Note";
$current_user = 1;

if($_SERVER["REQUEST_METHOD"]==="POST"){
$note = $db->query('SELECT * FROM posts WHERE id =:id', ['id' => $_GET["id"]])->findOrFail();
authorize($note["users_id"] === $current_user);
$db->query("DELETE FROM posts WHERE id=:id",[
    'id'=>$_GET["id"]
]);
header('location:/notes');
}
else
{
$note = $db->query('SELECT * FROM posts WHERE id =:id', ['id' => $_GET["id"]])->findOrFail();
authorize($note["users_id"] === $current_user);
 view("notes/show.view.php",['heading'=>'My Note','note'=>$note]);
}