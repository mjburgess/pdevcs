<?php

$add = function ($x, $y) {
    return $x + $y;
};

$add(2, 3);

$a = array(2, 3, 4);

array_walk($a, function(&$value) {
    $value *= $value;
});

class Output {
    public function __invoke($value, $key) {
        echo "$value\n";
    }
}

array_walk($a, new Output()); //4, 9, 16


