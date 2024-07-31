<?php

namespace Classes;

use Classes\ServiceContainer\App;

class Authenticator
{
    public static function userExist($email, $password)
    {
        $db = App::resolve(Database::class);

        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            ':email' => $email
        ])->find();

        if (! $user || ! password_verify($password, $user['password'])) {
            Session::flash('email', 'No matching email or password found in our records');
        }

        return Session::has('_flash');
    }
}