<?php
use Core\Database;
use Core\App;
use Core\Validate;
$db = App::resolve(Database::class);
$current_user = 1;

$note = $db->query('SELECT * FROM posts WHERE id =:id', ['id' => $_POST["id"]])->findOrFail();
authorize($note["users_id"] === $current_user);
$errors = [];
if(!Validate::string(($_POST["title"]),1,1000))
    {
        $errors["title"]="A body of no more than 1000 characters required";
    }
if(count($errors)){
    return view("notes/edit.view.php",[
        'heading'=>'Edit Note',
        'errors'=>$errors,
        'note'=>$note
    ]);
}
    $db->query('update posts set title=:title where id=:id',[
        'id'=> $_POST["id"],
        "title"=>$_POST["title"]
    ]);
    header("location:/notes");
    die();
