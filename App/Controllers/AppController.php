<?php
namespace App\Controllers;

class AppController extends Controller {
    public function index() {
        $this->view->render('pages/index');
    }

    public function login() {
        $this->view->render('pages/login');
    }

    public function attemptLogin() {
        $params = $this->getFormData();
        print_r($params);
    }
}