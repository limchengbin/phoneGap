<?php

require_once("database.php");


$id = $_GET['id'];
$_SESSION['language_id'] = $id;
$query = "SELECT * from language where language_id= :id;";
$statement = $db->prepare($query);
$statement->bindValue(":id", $id);
$statement->execute();
$language = $statement->fetchAll();
$statement->closeCursor();

$query2 = "SELECT * from payment_completed where language_id= :id AND member_id = :member;";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":id", $id);
$statement2->bindValue(":member",$_SESSION['memberID']);
$statement2->execute();
$language2 = $statement2->fetchAll();
$statement2->closeCursor();


$_SESSION['name'] = $language[0][1];
$_SESSION['current'] = $language2[0][3];

$test = "SELECT * FROM " . $_SESSION['name'] . " WHERE id=" . $_SESSION['current'] ;

$query3 = $test;
$statement3 = $db->prepare($query3);
$statement3->execute();
$language3 = $statement3->fetch();
$statement3->closeCursor();
 

