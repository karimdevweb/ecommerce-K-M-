<?php


setcookie("accepteCookie", true, time() +60*60*24*30, "/", null, 0, true);

if(isset($_SERVER["HTTP_REFERER"]) && !empty($_SERVER["HTTP_REFERER"]))
{
    header("Location:". $_SERVER["HTTP_REFERER"]);
}else{
    header("Location: index.php?class=user&action=welcomePage");
}


