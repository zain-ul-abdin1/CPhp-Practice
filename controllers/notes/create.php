<?php
require base("core/Validator.php");
$connect = require base("connect.php");
$db = new Database($connect["database"]);
$heading = "Create Note";
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(!Validate::string(($_POST["title"]),1,1000))
    {
        $errors["title"]="A body of no more than 1000 characters";
    }
    if(empty($errors)){
    $db->query('INSERT INTO posts (title,users_id) VALUES(:title,:users_id)', [
        "title" => $_POST["title"],
        "users_id" => 1
    ]);
    }
}       
 view("notes/create.view.php",['heading'=>'Create Note','errors'=>$errors]);
