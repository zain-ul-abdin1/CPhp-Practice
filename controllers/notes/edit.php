<?php
  use Core\Database;
use Core\App;
$db = App::resolve(Database::class);
$current_user = 1;

$note = $db->query('SELECT * FROM posts WHERE id =:id', ['id' => $_GET["id"]])->findOrFail();
authorize($note["users_id"] === $current_user);
 view("notes/edit.view.php",['heading'=>'Edit Note','errors'=>[],"note"=>$note]);
