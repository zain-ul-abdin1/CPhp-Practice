<?php
$connect = require "connect.php"; 

$db = new Database($connect["database"]);

 $heading = "My Note";
 $id=$_GET["id"];

 $note = $db->query('SELECT * FROM posts WHERE id =:id',['id'=>$id])->fetch();
 //dd($notes);
 require "views/note.view.php";