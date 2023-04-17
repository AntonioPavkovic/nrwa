
<?php

class Controller extends DatabaseConnection {

    public static function CreateView($viewName, $data = null){
        require_once "./Views/".$viewName.".php";
    }
}