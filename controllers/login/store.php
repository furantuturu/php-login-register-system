<?php
use Classes\Authenticator;
use Classes\Session;

$email = $_POST['email'];
$password = $_POST['password'];

Session::flash('_old', [
    'email' => $email
]);

if (! Authenticator::userExist($email, $password)) {
    redirect('/login');
}

Session::put('user', [
    'email' => $email
]);

session_regenerate_id(true);

redirect('/dashboard');