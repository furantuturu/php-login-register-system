<?php

namespace Classes;

class Session
{
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }
    
    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    public static function has($key)
    {
        return (bool) static::get($key);
    }

    public static function get($key, $default = '')
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function destroy()
    {
        $_SESSION = [];
        session_destroy();

        $cookieParams = session_get_cookie_params();

        setcookie(
            'PHPSESSID',
            '',
            time() - 3600,
            $cookieParams['path'],
            $cookieParams['domain'],
            $cookieParams['secure'],
            $cookieParams['httponly']
        );

    }
}