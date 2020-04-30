<?php

define("DATABASE", [
    "dbname" => "ecommerce",
    "user" => "root",
    "password" => ""
]);

define("TVA", 1.2);

        
$folder = explode("/",$_SERVER["REQUEST_URI"]);
        if(empty($folder[1]))
        $f = "";
        else
        $f = "/".$folder[1];
        
        
define("SERVER", [
        "host" => $_SERVER["HTTP_HOST"],
        "folder" => $f
        ]);



/************eCaptcha *************/
define("KEY",[
        "site"=>"6LeDe-EUAAAAAEH8ifvUHV0T6pPoOxiGXyWuXdFJ",
        "secret"=>"6LeDe-EUAAAAAOc1WS4LZYBd3ruKxaVn-AzGcKfC"
]);



/************paypal *************/
define("PAYPAL", [
        'clientId' => "AVeMVqd5a2Wx4XZIz4ZW4p9f77qIzCU7Wdq_Q2usbQqSdWA1vjb42Gx3UZS2XV0arUVBASev_QGcbYtd",
        "secret" => "ENsrWJGXp6EYMFZ5gUsnbzc2QHs9RNZAmSZzdYn4Ov8iwCvw3Nkl7ZC1rt1vtnJOHi_-4N9otOzUuHEL"
    ]);



/************BASEURL *************/
define("BASEURL", "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER['REQUEST_URI']));

?>

