<?php
class Controller {
    public function model($model){ 
        require_once "./app/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]) {
        require_once "./app/views/".$view.".php";
    }

    public function layoutDoctor($layout, $data=[]){
        $layoutPath = "./app/views/" . $layout . ".php";
        if (file_exists($layoutPath)) {
            require_once $layoutPath;
        } else {
            die("Tệp $layout không tồn tại.");
        }
    }
}

?>