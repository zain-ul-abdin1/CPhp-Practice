<?php
use Core\Database;
use Core\Validate;
use Core\App;
$db = App::resolve(Database::class);
$errors=[];
if(!Validate::string(($_POST["title"]),1,1000))
    {
        $errors["title"]="A body of no more than 1000 characters";
    }
    if(!empty($errors))
    {
         view("notes/create.view.php",['heading'=>'Create Note','errors'=>$errors]);
    }
    $db->query('INSERT INTO posts (title,users_id) VALUES(:title,:users_id)', [
        "title" => $_POST["title"],
        "users_id" => 1
    ]);
    header("location:/notes");
    