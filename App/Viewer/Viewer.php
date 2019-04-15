<?php
namespace App\Viewer;

class Viewer {
    public function render($template) {
        try {
            $viewDirectory = $_SERVER['DOCUMENT_ROOT'].'/views/';

            $source = $viewDirectory.$template.'.html';
            // print view on screen
            print_r(file_get_contents($source, FILE_USE_INCLUDE_PATH));
        } catch (Exception $ex) {
            echo $ex;
        }
    }
}