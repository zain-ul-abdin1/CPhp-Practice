<?php
$connect = require base("connect.php");

$db = new Database($connect["database"]);

$heading = "My Note";
$current_user = 1;

$note = $db->query('SELECT * FROM posts WHERE id =:id', ['id' => $_GET["id"]])->findOrFail();
authorize($note["users_id"] === $current_user);
//dd($note);
 view("notes/show.view.php",['heading'=>'My Note','note'=>$note]);
