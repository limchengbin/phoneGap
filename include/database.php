<?php

$dsn = "mysql:host=localhost;dbname=JAB";
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db ->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
    error_reporting(E_ALL) ;
//    echo "connected" ;
} catch (Exception $ex) {
    $error_message = $ex->getMessage();
    exit() ;
}

