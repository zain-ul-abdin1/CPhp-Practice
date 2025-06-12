<?php
$heading = "Create Note";

$connect = require "connect.php";

$db = new Database($connect["database"]);

if($_SERVER["REQUEST METHOD"]==="POST"){
$db->query('INSERT INTO posts(title,users_id) VALUES(:title,:users_id)',[
    "title"=>$_POST["title"],
    "users_id"=>1
]);
}
require "views/noteCreate.view.php";
