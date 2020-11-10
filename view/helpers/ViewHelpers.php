<?php


class ViewHelpers
{
    public static function getFlashMessage()
    {
        $msg = $_SESSION['flashmessage'];
        unset ($_SESSION['flashmessage']);
        return $msg;
    }

    public static function peekFlashMessage()
    {
        return isset($_SESSION['flashmessage']);
    }

    public static function setFlashMessage($msg)
    {
        $_SESSION['flashmessage'] = $msg;
    }
}
