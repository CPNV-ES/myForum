<?php
/*
 * Created by cyril Goldenschue
 */

class config
{
    private $username = "ConnectDB";
    private $password = "Adm1n123";
    private $dsn = "mysql:host=localhost;dbname=myforum;charset=utf8";


    function GetUser()
    {
        return $this -> username;
    }

    function GetPass()
    {
        return $this -> password;
    }

    function GetDSN()
    {
        return $this -> dsn;
    }

}