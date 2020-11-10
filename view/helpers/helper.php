<?php 

class helper{
    
    static function getMessage()
    {
        $msg = $_SESSION['flashMessage'];
        unset($_SESSION['flashMessage']);
        return $msg;
        
    }

    static function setMessage($msg)
    {
        $_SESSION['flashMessage'] = $msg;
    }

    static function peakMessage()
    {
        return isset($_SESSION['flashMessage']);
    }

}





?>