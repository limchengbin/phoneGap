<?php
require_once("database.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$id = $_GET['id'];

$query = "SELECT * from language WHERE language_id = :id ";
$statement = $db->prepare($query);
$statement->bindValue(":id", $id);
$statement->execute();
$lang = $statement->fetch();
$statement->closeCursor();