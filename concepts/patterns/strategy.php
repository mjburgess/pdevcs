<?php
interface IOutputStrategy {
    public function prepare($mixed);
    public function write($string);
}

class PrintrStrategy {
    public function prepare($string) {
        return print_r($string, true);
    }
    
    public function write($string) {
        echo $string;
    }
}

class VardumpStrategy implements IOutputStrategy {
    public function prepare($string) {
        return var_export($string, true);
    }
    
    public function write($string) {
        echo $string;
    }
}

class PrettyPrint {
    public function write(IOutputStrategy $o, $mixed) {
        $string = $o->prepare($mixed);
        $o->write($string);
    }
}

$p = new PrettyPrint();
$p->write(new VardumpStrategy(), $p);