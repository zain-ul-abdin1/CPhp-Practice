<?php
$connect = require "connect.php"; 

$db = new Database($connect["database"]);

 $heading = "My Note";
 $id=$_GET["id"];
$current_user = 2;

 $note = $db->query('SELECT * FROM posts WHERE id =:id',['id'=>$id])->fetch();
 dd($note);
 if(!$note)
 {
    abort();
 }
 if($note["users_id"]!=$current_user)
 {
    abort(Response::FORBIDDEN);
 }
 //dd($note);
 require "views/note.view.php";