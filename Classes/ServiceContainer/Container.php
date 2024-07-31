<?php

namespace Classes\ServiceContainer;

class Container
{
    private $bindings;
    public function bind($key, $builder)
    {
        $this->bindings[$key] = $builder;
    }

    public function resolve($key)
    {
        if (! array_key_exists($key, $this->bindings)) {

            throw new \Exception("No matching binding found in key: {$key}");

        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}