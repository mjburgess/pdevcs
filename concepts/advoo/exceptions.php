<?php

class MyException extends Exception {
    
}

function error_prone() {
    if(rand(0,1)) {
        throw new MyException();
    } else {
        throw new Exception();
    }
}

try {
    error_prone();
} catch(MyException $e) {
    echo $e->message();
} catch(Exception $e) {
    echo $e->message();
}

function operation($op, $x, $y) {
    if(!in_array($op, array('add', 'sub', 'mul', 'div'))) {
        throw new Exception('You must specify a valid operation!');
    }
    
    //continue assuming $op is valid
    $op($x, $y);
}

function add($x, $y) {
    if(!(is_int($x) && is_int($y))) {
        return false;
    } else {
        return $x + $y;
    }
}

if(add('a', 2)) {
    //continue
} else {
    //handle failure
}

try {
    operation('log', 10, 3);
} catch(Exception $e) {
    //error reporting, handling, graceful exit of application
}