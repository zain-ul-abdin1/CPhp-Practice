<?php
use Core\Database;
$connect = require base("connect.php");

$db = new Database($connect["database"]);

$heading = "My Notes";

$notes = $db->query('SELECT * FROM posts WHERE users_id = 1')->getAll();
//dd($notes);
view("notes/index.view.php",['heading'=>'My Notes','notes'=>$notes]);
