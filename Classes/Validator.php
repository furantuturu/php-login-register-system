<?php

namespace Classes;

use Classes\ServiceContainer\App;

class Validator
{
    private static function passwordLenCheck($password)
    {
        return strlen($password) > 8;
    }

    private static function emailValidate($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private static function sameEmail($email)
    {
        $db = App::resolve(Database::class);

        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            ':email' => $email
        ])->find();

        return (bool) $user;
    }

    public static function validate($email, $password)
    {
        if (! static::passwordLenCheck($password)) {
            Session::flash('password', 'Password must be 8 characters long');
        }

        if (! static::emailValidate($email)) {
            Session::flash('email', 'Please put a valid email address');
        }

        if (static::sameEmail($email)) {
            Session::flash('email', 'This email has already been registered.');
        }

        return Session::has('_flash');
    }
}