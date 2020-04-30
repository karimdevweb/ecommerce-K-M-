<?php


class SessionFlash
{


    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        if(!array_key_exists("flash", $_SESSION))
        {
            $_SESSION["flash"] = [];
        }
    }


    private function add($message, $type)
    {
        array_push($_SESSION['flash'], ["type" => $type, "message" => $message]);
    }
 
    
    public function flash()
    {
        if(!empty($_SESSION['flash']))
        {
            foreach ($_SESSION['flash'] as $value) 
            {
                echo <<<HTML
                    <div class="alert_flash alert_{$value['type']}  fadeOut animated delay-2s" >
                             <p>{$value['type']}:</p>
                             <p>{$value['message']}</p> 
                    </div>
HTML;
            }
            unset($_SESSION['flash']);
        }
    }
    
    public function success($message)
    {
        $this->add($message, "success");
    }

    public function error($message)
    {
        $this->add($message, "error");
    }

    public function information($message)
    {
        $this->add($message, "information");
    }
    public function warning($message)
    {
        $this->add($message, "warning");
    }
}


