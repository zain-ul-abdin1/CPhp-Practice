<?php
require "Validator.php";
$connect = require "connect.php";
$db = new Database($connect["database"]);
$heading = "Create Note";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];
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
require "views/notes/create.view.php";
