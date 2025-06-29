<?php

$connect = require "connect.php";
$db = new Database($connect["database"]);
$heading = "Create Note";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];
    if(strlen($_POST["title"])===0)
    {
        $errors["title"]="title cannot be empty";
    }
    if(strlen($_POST["title"])>1000)
    {
        $errors["title"]="characters must be less than 1,000";
    }
    if(empty($errors)){
    $db->query('INSERT INTO posts(title,users_id) VALUES(:title,:users_id)', [
        "title" => $_POST["title"],
        "users_id" => 1
    ]);
}
}
require "views/note-create.view.php";
