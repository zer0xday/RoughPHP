<?php
namespace App\Controllers;

require 'App/Viewer/Viewer.php';
use \App\Viewer\Viewer as View;

class Controller {
    protected $view;

    public function __construct() {
        $this->view = new View();
    }

    protected function getFormData() {
        if(isset($_POST)) {
            $obj = [];

            foreach($_POST as $key => $value) {
                $obj[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }

            return (object) $obj;
        }
    }
}