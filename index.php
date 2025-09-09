<?php

class Cat {
    public function __construction()
    {
        var_dump('Class was created');
    }

    public function __invoke($value)
    {
        var_dump($values);
    }

    public function __call($name, $arguments)
    {
        var_dump($name);
        var_dump($arguments);
    }

    public function __get($name)
    {

        var_dump($name);
        return 'Cool stuff man';
    }

    public function __set($name, $value)
    {
        var_dump($name);
        var_dump($value);
    }

    public function __toString()
    {
        return 'Meow Meow Neighbour';
    }

    public function __destruct()
    {
        var_dump('Class was destroyed');
    }
}

makeCat();
$kitty = new Cat();
var_dump($kitty);
var_dump($kitty -> mood);
$kitty -> mood = 'happy';
$kitty -> throwShit 
echo $kitty;
$kitty = 1;
var_dump('something');



