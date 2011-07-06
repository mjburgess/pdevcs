<?php
interface IVariable {
    public function asInteger();
}

class SimpleVar implements IVariable {
    public function asInteger() {
        return 1;
    }
}

abstract class AComplexVariable implements IVariable {
    public function asInteger() {
        return $this->calculate();
    }
    
    public function calculate() {
        return 9 * 8 * 7 * 6;
    }
}

class ComplexVar extends AComplexVariable  {
    public function asInteger() {
        return (int) $this->calculate() / 100;
    }
}

class AnotherComplexVar extends AComplexVariable {
    //...
}

