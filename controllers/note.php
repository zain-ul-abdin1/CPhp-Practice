<?php
$connect = require "connect.php"; 

$db = new Database($connect["database"]);

 $heading = "My Note";
 $id=$_GET["id"];
$current_user = 1;

 $note = $db->query('SELECT * FROM posts WHERE id =:id',['id'=>$id])->findOrFail();

 authorize($note["users_id"]==$current_user);
 //dd($note);
 require "views/note.view.php";