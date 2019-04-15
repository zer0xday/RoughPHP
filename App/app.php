<?php
class App {
    protected $ROUTER;
    protected $routes = array(
        'get' => array(),
        'post' => array()
    );

    public function __construct($router) {
        $this->ROUTER = $router;
        $this->routes['get'] = $this->ROUTER->GET;
        $this->routes['post'] = $this->ROUTER->POST;
    }

    public function executeControllerMethod($controller) {
        try {
            // explode controller name and mehotd
            $c_explode = explode('#', $controller);
            // create temporary obj
            $controller = (object) [
                'name' => $c_explode[0],
                'method' => $c_explode[1],
            ];

            // create Controller Class
            $class = '\App\Controllers\\'.$controller->name;
            $c = new $class;

            //reassign method from controller temp object
            $method = $controller->method;
            // execute method
            $c->$method();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public function go() {
        $request = $_SERVER['REQUEST_URI'];
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if(array_key_exists($request, $this->routes[$method])) {
            $this->executeControllerMethod($this->routes[$method][$request]);
        } else {
            $this->abort(404);
        }
        die();
    }

    private function abort($code) {
        echo "ERROR $code";
    }
}