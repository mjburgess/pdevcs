<?php

/**
 * Represents an internal request for routing
 */
class MvcRequest {
    /**
     * Immutable (per Object)
     * @var string 
     */
    private $controller;
        public function getController() {
            return $this->controller;
        }
        
    /**
     * Immutable (per Object)
     * @var string 
     */
    private $action;
        public function getAction() {
            return $this->action;
        }
        
    /**
     * Initialize Request
     * 
     * @param string $controller    Controller Name
     * @param string $action        Method Name
     */
    public function __construct($controller, $action) {
        $this->controller = $controller;
        $this->action     = $action;
    }
}

/**
 * Interface routing strategies must provide
 */
interface IRouter {
    public function getRequest();
    public function dispatch();
}

/**
 * Router Factory, provides access to different routing strategies
 */
class Router {
    public static function FromUri($uri) {
        return new RouteFromUri($uri);
    }
}

class RouteFromUri implements IRouter {
    private $request;
        public function getRequest() {
            return $this->request;
        }
        private function _setRequest($uri) {
            list($c, $a) = explode('/', $uri);
            $this->request = new MvcRequest($c, $a);
        }
    
    public function __construct($uri) {
        $this->_setRequest($uri);
    }
    
    /**
     * Dispatches to AController
     */
    public function dispatch() {
        $controller = $this->request->getController();
        $controller = new $controller;
        
        $controller->dispatch($this->request); //foward dispatching to controller
    }
}

/**
 * Entry point for application
 */
class Application {
    /**
     * Dispatchs to Router
     * 
     * @param MvcRequest $request 
     */
    public static function dispatch(IRouter $r) {
        $r->dispatch();
    }
}


abstract class AController {
    /**
     * Handles selection of the controller method
     * @param MvcRequest $r 
     */
    public function dispatch(MvcRequest $r) {
        $this->{$r->getAction()}();
    }
}

/**
 * Blog controller
 */
class Blog extends AController {
    /**
     * Dummy function, issues 'Hello World'
     */
    public function post() {
        echo 'Hello World!';
    }
}

$r = Router::FromUri('Blog/post'); //dummy uri, usually from $_SERVER['REQUEST_URI'], etc.
Application::dispatch($r);