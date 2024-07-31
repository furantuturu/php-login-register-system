<?php
use Classes\Database;
use Classes\ServiceContainer\App;
use Classes\Session;
use Classes\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

Session::flash('_old', [
    'email' => $email
]);

if (Validator::validate($email, $password)) {
    redirect('/register');
}

$db = App::resolve(Database::class);

$db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
    ':email' => $email,
    ':password' => password_hash($password, PASSWORD_BCRYPT)
]);

redirect('/');