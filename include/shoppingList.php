<?php
require_once("database.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$query = "SELECT * from myorder where member_id = :member ";
$statement = $db->prepare($query);
$statement ->bindValue(":member" , $_SESSION['memberID']);
$statement->execute();
$list = $statement->fetchAll();
$statement->closeCursor();




