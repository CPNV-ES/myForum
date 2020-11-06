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

if (isset($_SESSION['flashMessage'])) {
    echo "<div class='alert alert-primary'>";
    echo $_SESSION['flashMessage'];
    unset($_SESSION['flashMessage']);
    echo "</div>";
}




?>