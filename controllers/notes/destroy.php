<?php

use Core\App;
use Core\Database;
$db = App::resolve(Database::class);

$current_user = 1;

$note = $db->query('SELECT * FROM posts WHERE id =:id', ['id' => $_POST["id"]])->findOrFail();
authorize($note["users_id"] === $current_user);
$db->query("DELETE FROM posts WHERE id=:id", [
    'id' => $_POST["id"]
]);
header('location:/notes');
exit();
