<?php

//The Problem of Globals
function change_a() {
    global $a;
    
    $a = rand(0, 10);
}

function calculate($b) {
    global $a;
    
    echo $a * $b;
}



change_a();
echo calculate(3);

change_a();
echo calculate(3);

//A similar problem with statics and singletons
class A {
    static $_instance;
        public static function getInstance() {
            if(!self::$_instance instanceof A) {
                self::$_instance = new A();
            }
            
            return self::$_instance;
        }
    
    private $a;
        public function getA() {
            return $this->a;
        }
        public function change() {
            $this->a = rand(0, 10);
        }
}

class B {
    public static function calculate($b) {
        return A::getInstance()->getA() * $b;
    }
}

A::getInstance()->change();
B::calculate(3);

A::getInstance()->change();
B::calculate(3);

namespace { 
    class X {
        public static $x; //truely global

        public static function global_function() {
            self::$x = rand(0, 10);
        }
    }
}

//the solution
class Subject {
    private $a; 
        public function getA() {
            return $this->a;
        }
    
    public function mutateState() {
        $this->a = rand(0, 10);
    }
}

class Consumer {
    private $a;
    
    public function __construct(Subject $s) {
        $this->a = $s->getA();
    }
    
    public function calculate($b) {
        echo $this->a * $b;
    }
}

$s = new Subject();
$s->mutateState();

$c = new Consumer($s);

$c->calculate(3);
$s->mutateState();

$c->calculate(3);