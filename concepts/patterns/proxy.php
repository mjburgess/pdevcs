<?php

class AProxy {
    private $target;
        protected function setProxyTarget($t) {
            $this->target = $t;
        }
        protected function getProxyTarget() {
            return $this->target;
        }
        
        public function __construct() {
            $defaultTarget = str_replace('Proxy', '', get_class());
            $this->setProxyTarget(new $defaultTarget);
        }
}

class APreProxy extends AProxy {
    public function __call($method, array $args) {
        call_user_func_array(array($this, $method), $args);
        call_user_func_array(array($this->target, $method), $args);
    }
}

class APostProxy extends AProxy {
    public function __call($method, array $args) {
        call_user_func_array(array($this->target, $method), $args);
        call_user_func_array(array($this, $method), $args);
    }
}

class ADecoratingProxy extends AProxy {
    public function __call($method, array $args) {
        $return = call_user_func_array(array($this->target, $method), $args);
        $this->$method($return, $args);
    }
}

class Store {
    public function read() {
        return 'Read';
    }
    
    public function write() {
        return 'Write';
    }
}

class StoreProxy extends ADecoratingProxy {
    public function write($return) {
        
    }
}

