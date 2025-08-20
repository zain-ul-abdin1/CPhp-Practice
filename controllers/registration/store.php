<?php

use Core\App;
use Core\Database;
use Core\Validate;

$email = $_POST["email"];
$password = $_POST["password"];
$errors = [];
if (!Validate::email($email)) {
    $errors["email"] = "Provide a valid email address";
}
if (!Validate::string($password, 7, 255)) {
    $errors["password"] = "Provide a password of at least seven characters";
}
if (!empty($errors)) {
    return view("registration/create.view.php", [
        "errors" => $errors
    ]);
}
$db = App::resolve(Database::class);
$user = $db->query("select * from users where email = :email", [
    "email" => $email
])->find();

if ($user) {
    header("location:/index");
    exit();
} else {
    $db->query("insert into users(email,password) values(:email , :password)", [
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT)
    ]);
    login($user);
    header("location:\index");
    exit();
}
