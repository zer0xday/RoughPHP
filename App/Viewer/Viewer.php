<?php
namespace App\Viewer;

class Viewer {
    protected $extension;

    // set default extension to HTML
    public function __construct($extension = 'php') {
        $this->extension = $this->formatExtension($extension);
    }

    // format extension '.sample'
    private function formatExtension($extension) {
        if(strpos($extension, '.') !== false) {
            return $extension;
        }
        return '.'.$extension;
    }

    // render view template
    public function render($template) {
        try {
            $viewDirectory = $_SERVER['DOCUMENT_ROOT'].'/views/';
            $appLayout = $viewDirectory.'app.php';

            $source = $viewDirectory.$template.$this->extension;
            $_SESSION['view'] = $source;
            // temporary resolve
            include $appLayout;
            // readfile($source);
            // print view on screen
            // print_r(file_get_contents($source, FILE_USE_INCLUDE_PATH));
        } catch (Exception $ex) {
            echo $ex;
        }
    }
}