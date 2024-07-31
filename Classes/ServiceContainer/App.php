<?php

namespace Classes\ServiceContainer;

class App
{
    private static $container;
    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function getContainer()
    {
        return static::$container;
    }

    public static function bind($key, $builder)
    {
        static::getContainer()->bind($key, $builder);
    }

    public static function resolve($key)
    {
        return static::getContainer()->resolve($key);
    }
}