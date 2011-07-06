<?php

function parse($request) {
    list($controller, $action) = explode('.', $request);
    return array('controller' => $controller, 'action' => $action);
}

function add_model(array $request) {
    $username = 'Hello World!';
    return $request + array('model' => array('username' => $username));
}

function get_controller(array $request) {
    return array($request['controller'] . '_' . $request['action'], $request['model']);
}

function view($qualified_request) {
    list($function, $data) = $qualified_request;
    
    ob_start();
        $function($data);
    $contents = ob_get_clean();
    
    return '<p>' . $contents . '</p>';
}

function blog_post(array $model) {
    echo $model['username'];
}

$input = 'blog.post';

echo view(get_controller(add_model(parse($input))));

//testing covers 100% of code with ease

print_r($output = parse($input));
print_r($output = add_model($output));
print_r($output = get_controller($output));
print_r($output = view($output));