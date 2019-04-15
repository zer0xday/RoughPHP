<?php
namespace App\Controllers;

class AppController extends Controller {
    public function index() {
        print 'hello AppController';
        $this->view->render('index');
    }

    public function login() {
        print 'Hello login AppController';
        $this->view->render('login');
    }

    public function attemptLogin() {
        $params = $this->getFormData();
        print_r($params->password);
    }
}