<?php


// function controller_autoloader($class) {
//     include 'controller/' . $class . '.php';
// }

// spl_autoload_register('controller_autoloader');


// function models_autoloader($class) {
//     include 'models/' . $class . '.php';
// }

// spl_autoload_register('models_autoloader');


// function utilities_autoloader($class) {
//     include 'utilities/' . $class . '.php';
// }

// spl_autoload_register('utilities_autoloader');




spl_autoload_register(function ($class)
{
    $sources = [
        "controleur/$class.php",
        "models/$class.php",
        "utilities/$class.php"
    ];

    foreach($sources as $source)
    {
        if(file_exists($source))
        {
            require_once $source;
        }
    }
});