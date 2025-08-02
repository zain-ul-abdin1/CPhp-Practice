<?php
use Core\Database;
use Core\App;
$db = App::resolve(Database::class);

$heading = "My Notes";

$notes = $db->query('SELECT * FROM posts WHERE users_id = 1')->getAll();
//dd($notes);
view("notes/index.view.php",['heading'=>'My Notes','notes'=>$notes]);
