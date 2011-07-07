<?php

function Login($pass, $confpass) {
    if($pass != $confpass) {
        return false;
    } else {
        //auth
    }
}

function GetUser() {
    if(DbHasFailed()) {
        throw new Exception('Database Failure!');
    }
}


if(Login(1, 2)) {
    //...
} else {
    //redirect to login page
}


try {
    GetUser();
} catch (Exception $e) {
    //...gracefully exit
}


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