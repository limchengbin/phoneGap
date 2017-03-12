<?php
require_once("database.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$query = "SELECT * from payment_completed WHERE member_id = :id ";
$statement = $db->prepare($query);
$statement->bindValue(":id", 1);
$statement->execute();
$lang = $statement->fetchAll();
$statement->closeCursor();

