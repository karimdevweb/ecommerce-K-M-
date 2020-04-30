<?php

require "utilities/const.php";
require_once 'vendor/autoload.php';

//site.fr/index.php?c=user&action=login
require_once "utilities/autoload.php";


//monsite.fr/index.php?class=user&action=register


if(isset($_GET['class']))
{
    if(isset($_GET['action']))
    {
                $controller = ucfirst($_GET['class'])."controller";
        // UserController
        $action = $_GET['action'];
        // register()

        $c = new $controller();
        $c->$action();
    }else
        {
            $c = new $controller();
        }
}else{
    $controller =ucfirst("front")."controller";
    $c = new $controller();
    $c->HomePage();
}






?>