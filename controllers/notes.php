<?php
$connect = require "connect.php"; 

$db = new Database($connect["database"]);

 $heading = "My Notes";
 
 $notes = $db->query('SELECT * FROM posts WHERE users_id = 2')->fetchAll();
 //dd($notes);
 require "views/notes.view.php";