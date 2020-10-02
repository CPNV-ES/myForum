<?php

require 'vendor/autoload.php';

use Expreql\Expreql\Database;

$config = parse_ini_file('config.ini');

Database::set_config($config);



?>


