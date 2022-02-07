<?php
 error_reporting(E_ALL ^ E_NOTICE);

$hostname = '127.0.0.1';

$username = 'root';

$password = '123456';
try {
    $db = new PDO("mysql:host=$hostname;dbname=orenyi_base_v1", $username, $password);	
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
date_default_timezone_set('America/Mexico_city');
$script_tz = date_default_timezone_get();
?> 