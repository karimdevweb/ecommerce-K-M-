<?php


class SessionUser
{
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        if(!array_key_exists("user", $_SESSION))
        {
            $_SESSION["user"] = [];
        }
    }

    public function login($user)
    {
        $_SESSION["user"] = [
            "role" => $user["role"],
            "id" => $user["id"],
            "logged" => true,
            "firstName" => $user["firstName"], 
            "lastName"=> $user["lastName"],
            "email" => $user["email"]
        ];
    }

    public function logout()
    {
        unset($_SESSION["user"]);
    }

    public function isLogged()
    {
        if(array_key_exists("logged" , $_SESSION["user"]))
        {
            
            if($_SESSION['user']["logged"])
                return true;
        }
        return false;
    }
    
    public function isAdmin()
    {
        if(array_key_exists("role" , $_SESSION["user"]))
        {
            if($_SESSION['user']["role"] == "admin")
                return true;
        }
        return false;
    }
   
    public function isClient()
    {
        if(array_key_exists("role" , $_SESSION["user"]))
        {
            if($_SESSION['user']["role"] == "client")
                return true;
        }
        return false;
    }


    public function isLoggedWithRole($role)
    {
        if(array_key_exists("role" , $_SESSION["user"]))
        {
            if($_SESSION['user']["role"] == $role)
                return true;
        }
        return false;
    }

    public function getIdClient()
    {
        return $_SESSION['user']['id'];
    }
}

