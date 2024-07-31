<?php

namespace Classes\Middleware;

class Guest
{
    public static function handle()
    {
        if (isset($_SESSION['user'])) {
            redirect('/');
        }
    }
}