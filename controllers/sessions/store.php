<?php

use Core\App;
use Core\Database;
use Core\Validate;

$db = App::resolve(Database::class);

$email = $_POST["email"];

$password = $_POST["password"];

$errors = [];

if (!Validate::email($email)) {
    $errors["email"] = "Provide a valid email address";
}

if (!Validate::string($password)) {
    $errors["password"] = "Please provide a valid password.";
}
if (!empty($errors)) {
    return view("sessions/create.view.php", [
        "errors" => $errors
    ]);
}
$user = $db->query("select * from users where email = :email", [
    "email" => $email
])->find();

if (!$user) {
    return view("sessions/create.view.php", [
        "errors" => [
            "email" => "No matching account found for that email address."
        ]
    ]);
}
if ($user) {
    if (password_verify($password, $user["password"])) {
        login([
            "email" => $email
        ]);
        header("location:\index");
        exit();
    }
}
return view("sessions/create.view.php", [
    "errors" => [
        "password" => "No matching account found for that email address and password."
    ]
]);
