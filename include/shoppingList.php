<?php
require_once("database.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$query = "SELECT * from myorder  ";
$statement = $db->prepare($query);
$statement->execute();
$list = $statement->fetchAll();
$statement->closeCursor();




