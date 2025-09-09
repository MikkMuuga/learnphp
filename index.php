<?php

function hello (){
    var_dump("Hello World");
}

hello();
hello();
hello();

function helloName ($name){
    var_dump('Hello World', $name);
}

helloName("MIkk");
helloName("Muigab");
helloName();

function helloNameAndAge($name = 'unknown', $age){
    var_dump("Hello $name and yout $age years old");
}

helloNameAndAge("Mikk", 23);
helloNameAndAge("Muigab", 5);

function stuff(...$args){
    var_dump(...$args);
}

stuff(1,2,3);
stuff(1,2,3,4,5,6,7);

function sum($a, $b){
    return $a + $b;
    var_dump("This will never be executed");
}

$answer = sum(1,5);
var_dump($answer);

function biggerOrSmaller($a){
    if($a > 10){
        return 'Bigger';
    } else {
        return 'Smaller';
    }
}

var_dump(biggerOrSmaller(15));
var_dump(biggerOrSmaller(5));

function recursive($i){
    if($a < 10){
        var_dump($i);
        recursive($i + 1);
    }
}

recursive(0);