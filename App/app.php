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
            // explode controller name and method
            $c_explode = explode('#', $controller);
            // create temporary obj
            $controller = (object) [
                'name' => $c_explode[0],
                'method' => $c_explode[1],
            ];

            // create Controller Class
            $class = '\App\Controllers\\'.$controller->name;
            $ct = new $class;

            //reassign method from controller temp object
            $method = $controller->method;
            // execute method
            $ct->$method();
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    public function go() {
        // get requested uri
        $request = htmlentities($_SERVER['REQUEST_URI'], ENT_QUOTES, "UTF-8");
        // get requested method
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        // check in array
        if(array_key_exists($request, $this->routes[$method])) {
            // if route exists execute assigned controller method
            $this->executeControllerMethod($this->routes[$method][$request]);
        } else {
            // if not just abort with 404 code
            $this->abort(404);
        }
        // kill app
        die();
    }

    private function setHeaders() {
        header('Content-type: text/php');
    }


    private function abort($code) {
        echo "ERROR $code";
    }
}