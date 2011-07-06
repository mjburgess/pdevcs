<?php

/**
 * Adds one to $x, by reference
 * @param &int $x 
 */
function add_one(&$x) {
    $x++;
}

function pretty_print(/* ... */) {
    print_r(func_get_args());
}

function complex() {
    //describe some actions
}

abstract class DataTransferObject {
    //prefer to keep state as private as possible
    private $data;
        protected function getData() {
            
        }
        protected function setData(array $data) {
            
        }
}

class User extends DataTransferObject {
    public $Name;
    
    private $id;
        public function getID() {
            return $this->id;
        }
        public function setID($id) {
            $this->id = $id;
        }
    
    public function anApiFunction() {
        
    }
    
    private function _internalHelper() {
        $thisIsCamelCase = true;
    }
}


class Foo {
    public function __construct(Bar $b, array $a) {
        
    }
}

interface IWalkable {
    public function walk();
}

interface IGrowable {
    public function eat();
}

abstract class AMamal implements IGrowable {
    public function eat() {
        
    }
}

class Dog extends AMamal implements IWalkable {
    public function walk() {
        
    }
}


const MY_CONST = 10;

class Foo { const MY_CONST = 10; }

namespace OD {
    class Foo {}
}

namespace {
    new \OD\Foo();
}


namespace OD;

function this_is_an_example($argument_one, $argument_two) {
    return $argument_one * $argument_two;
}


namespace OD\Alpha\Beta\Gamma\Delta;


/**
* Summary of Intention (what the file provides and why)
*
* @package    \OD\Routing 
* @subpackage Exceptions
* @copyright  Copyright (c)  Orange Digital Ltd
* @version    OD Framework 1.0
* @link       http://documentation.link
*/
namespace OD\Routing\Exceptions;

use OD\Routing\Destination;

/**
 * Exception representing a missing destination 
 */
class RoutingException extends \Exception {
    /**
     * The destination at which the error occured
     * @var \OD\Routing\Destination 
     */
    private $destination;
        /**
         * @return \OD\Routing\Destination 
         */
        public function getDestination() {
            return $this->destination;
        }
    
    /**
     * Save destination state and issue PHP Exception with a 404 message
     * @param Destination $d 
     */
    public function __construct(Destination $d) {
        $this->destination = $d;
        parent::__construct("Could not reach $d", 404);
    }
}

/** 
 * Checks if file exists, also searching include path which file_exists() does not do
 * 
 * @param string $filename
 * @return boolean 
 */
function find_file($filename) {
    //open file and check include path
    $handle = fopen($filename, 'r', true);
    
    if ($handle === false) {
        return false;
    } else {
        fclose($handle);
        return true;
    }
}

/**
 * Checks if file exists
 */
function find_file($filename) {
    //open file with read permissions
    $handle = fopen($filename, 'r', true);
    //if file has failed to open 
    if ($handle === false) { return false; } 
    else { //close file link
        fclose($handle); return true;
    }
}


class Foo {
    public function count() {
        $targetTime = microtime(true) + 10; //now + 10ms
        
        $i = 0;
        while(true) {
            if(microtime(true) == $targetTime) {
                break;
            } else {
                echo $i++, PHP_EOL;
            }
        }
        
        $this->_reduceFat();
    }
    
    private function _reduceFat() {
        $shoppingList = array('Milk', 'Honey', 'Eggs');
        
        $listSize     = count($shoppingList);
        $newList      = array();
        
        for($listIndex = 0; $listIndex < $listSize; $listIndex++) {
            $newList[] = 'Low Fat' . $shoppingList[$i];
        }
    }
}


//no
$three = process_step_three(
    process_step_two(
            process_step_one($arg_one), $arg_two
    ), $arg_three);


//yes
$one   = process_step_one($arg_one);
$two   = process_step_two($one, $arg_two);
$three = process_step_three($two, $arg_three);

if($a) {
    process_a();
} elseif($b) {
    process_b();
} else {
    process_default();
}


switch($int) {
    case 1:
        process_one();
        break;
    
    case 2:
        process_two();
        break;
    
    default:
        process_default();
        break;
}

switch($str) {
    case 'String1':
    case 'String2':
        process_one_and_two();
        
    default:
        process_default();
}

switch($bool) {
    case true:  process_true();    break;
    case false: process_false();   break;
    default:    process_default(); break;
}

//prefer echo when not requiring print's return value

echo  'Hello World';
print 'Hello World';

//use require or require_once for libraries (files containing *required* functionality)
require 'a_file.php';
require_once 'a_file.php';

//use include for files which the application can handle not having (eg. view files)
include 'another_file.php';
include_once 'another_file.php';

function foo($x) { 
    return $x;
}

//unset, isset, die, exit, empty require parens
unset($foo);
isset($foo);

//prefer die for exiting with string output and exit for integer output
die('A message');

//0 for success and 1 for failure
exit(0);


$anAssociativeArray = array('message' => 'Hello World');

$aLargeAssocArray   = array(
                        'message' => 'Hello',
                        'to'      => 'World'
                    );


$anArray = array(1, 2, 3, 'Hello', 'World', true);

$anExtensiveArray = array(
                            1, 2, 3,
                            'Hello World', true, false,
                            'a', 'b', 1.1, 2.2
                   );


$myString = 'Hello ' . 'World' . PHP_EOL;

$anExtendedString = 'thisisatest this isatest this is a test '
                  . 'this is another test testing this is test '
                  . 'abcdefg 1234';


$stringLiteral = 'Hello World!';

//yes
echo "K&R's famous line $stringLiteral";

//no
echo "K&R's famous line {$stringLiteral}";
echo "K&R's famous line {lcfirst($stringLiteral)}";


$stringLiteral = 'Hello World!';
$stringLiteralWithQuotes = "K&R's Famous Line: Hello World!";


class Example {
    public function __construct($bool) {
        if($bool) {
            foreach(array(1,2,3) as $key => $value) {
                echo "$key is $value\n";
            }
        } else {
            while(true) {
                break;
            }
        }
    }
}


class Complete {
    public $Name; //public variables deprecated
    
    private $myArray;
        public function getMyArray() {
            return $this->myArray;
        }
        
        public function setMyArray(array $a) {
            $this->myArray = $a;
        }
        
        public function registerElement($e) {
            $this->myArray[] = $e;
        }
        
        public function unregisterElement($index) {
            uset($this->myArray[$index]);
        }
        
    public function __construct() {}
    public function apiOne() {}
    public function apiTwo() {}
    
    private function _helperOne() {}
    private function _helperTwo() {}
}



abstract class AFoo {
    abstract public static function AnotherStaticMethod();
    
    final public function __construct() {
        foreach(array(1, 2, 3) as $index => $value) {
            echo "$index = $value\n";
        }
    }
}

interface IFoo {
    public function getVariable();
    public function process();
}

class Bar extends AFoo implements IFoo, IBar, IBaz {
    public function concat() {
        'a' . 'b' . 'c';
    }
    public function ifAndElse() {
        if(true) {
            echo 'abc';
        } elseif(false) {
            echo 'def';
        } else {
            echo 'xyz';
        }
    }
    public function switchAndCase() {
        switch($foo) {
            case 1: 
                abc();
            case 2:
                def();
                break;
            default:
                xyz();
                break;
        }
    }
}

function my_helper_function(Foo $f) {
    static $foo;
    
    if(!$foo instanceof Foo) {
        $foo = new Foo($f);
    } 
    
    return $foo;
}

function get_op($op = 'add') {
    $operations = array(
                            'add' => function ($x, $y) { $x * $y; },
                            'mul' => function ($x, $y) { $x + $y; },
                   );
                            
    return $operations[$op];
}