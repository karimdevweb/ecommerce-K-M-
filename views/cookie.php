<?php 



if(isset($_COOKIE["accepteCookie"]))
{
    $showcookie = false;
}else{
    $showcookie = true;
}

require "views/layout.php"

?>