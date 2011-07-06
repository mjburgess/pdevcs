<?php



class HiddenDependency {
    public static function Message() {
        return 'Hello World';
    }
}

class Requests {
    public function say() {
        echo HiddenDependency::Message();
    }
}


class EntryPoint {
    public function dispatch($request) {
        $requestClass = new Requests();
        $requestClass->$request();
    }
}

$e = new EntryPoint();
$e->dispatch('say');


//modfiy the achitecture appropriately (Request and Entry)

class Requests {
    private $dependency;
    
    public function __construct(HiddenDependency $h) {
        $this->_dependency = $h;
    }
    
    public function say() {
        echo $this->dependency->Message();
    }
}

class BetterEntry {
    public function dispatch($request) {
        $r = new Requests(new HiddenDependency());
        $r->$request();
    }    
}

$e = new EntryPoint();
$e->dispatch('say');


class BestEntry {
    private $requests;
    
    public function __construct(Requests $r) {
        $this->requests = $r;
    }
    
    public function dispatch($request) {
        $this->requests->$request();
    }
}

//bootstrapping
$r = new Requests(new HiddenDependency());

$e = new EntryPoint($r);
$e->dispatch('say');

class X { 
    public function say() { echo 'Hello World'; }     
}

//case 1
class Y extends X {
    public function sayNoMore() { $this->say() . ' ... no more!'; }
}

//case 2
class Y {
    private $x;
    public function __construct() { $this->x = new X(); }   
    public function sayNoMore()   { $this->x->say() . '... no more!'; }
}

//case 3
class Y {   
    private $x;
    public function __construct(X $x) { $this->x = $x; }   
    public function sayNoMore()   { $this->x->say() . '... no more!'; }
}


