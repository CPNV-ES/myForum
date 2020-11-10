<?php
/*rename it ton config.php and insert your credentials*/
class config{

    public $host;
    public $username;
    public $password;
    public $databaseName;
    
    public function __construct()
    {
        $this->host = "127.0.0.1:3306";
        $this->username = "xxxx";
        $this->password = "xxxxxx";
        $this->databaseName = "xxxxxx";
    }

}