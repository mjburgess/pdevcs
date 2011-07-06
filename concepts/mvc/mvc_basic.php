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
    
    /**
     * Factory, returns MvcRequest composed from a / seperated string (Controller/Action)
     * 
     * @param string $requestString
     * @return MvcRequest 
     */
    public static function FromString($requestString) {
        list($controller, $action) = explode('/', $requestString);
        
        return new self($controller, $action);
    }
}

/**
 * Entry point for application
 */
class Application {
    /**
     * Dispatchs to controller method, selected based on $request
     * 
     * @param MvcRequest $request 
     */
    public static function dispatch(MvcRequest $request) {
        $controller = $request->getController();
        $controller = new $controller;
        $controller->{$request->getAction()}();
    }
}

/**
 * Blog controller
 */
class Blog {
    /**
     * Dummy function, issues 'Hello World'
     */
    public function post() {
        echo 'Hello World!';
    }
}

//Form 1 (Prefered)
Application::dispatch(MvcRequest::FromString('Blog/post'));

//Form 2
$a = new Application();
$r = MvcRequest::FromString('Blog/Post');

$a->dispatch($r);