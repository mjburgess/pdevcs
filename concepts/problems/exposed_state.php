<?php
//The problem of public state

class X {
    public $Collection;
    
    public function __construct() {
        $this->Collection = array();
    }
    
    public function calculate() {
        foreach($this->Collection as $c) {
            echo array_sum($c);
        }
    }
}

$x = new X();
$x->collection[] = array(1, 2, 3);
$x->calculate();


class Y {
    public $age;
}

$y = new Y();
$y->age = 'a12';

//use age
echo $y->age * 3;



class X {
    public $Collection;
    public $BetterCollection;
    
    public function calculate() { /*...*/ }
    public function calcBetter() {
        foreach ($this->BetterCollection as $adder => $sumArray) {
            echo array_sum($sumArray) + $adder;
        }
    }
}

$x = new X();
$x->BetterCollection = array(2 => array(2,3));
$x->calcBetter();

class Collection {
    private $data;
        public function getData() {
            return $this->data;
        }
        
        public function register($integer) {
            if(!is_int($integer)) {
                throw new Exception('Can only register integers!');
            }
            
            $this->data[] = $integer;
        }
        
}

class User {                            //old class
    public $Name;
}
class User {                            //new class
    public $Name; //do not use!
    public $FirstName;
    public $SecondName;
}
//compare with
class User {                            //old class
    private $name;
        public  function getName() {
            return $this->name;
        }
        public function setName($name) {
            $this->name = $name;
        }
}
class User {                            //new class
    private $firstName;
        public function getFistName() {}
        public function setFirstName() {}
    private $secondName;
        public function getSecondName() {}
        public function setSecondName() {}
        
        public function getName() {
            return $this->firstName . ' ' . $this->secondName;
        }
}



