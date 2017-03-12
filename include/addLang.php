<?php

require_once("database.php");


$id = $_POST['id'];



$query = "SELECT * from language WHERE language_id = :id ";
$statement = $db->prepare($query);
$statement->bindValue(":id", $id);
$statement->execute();
$lang = $statement->fetchAll();
$statement->closeCursor();

$language_name = $lang[0][1];
$language_price = $lang[0][2];




$query2 = "INSERT INTO myorder (member_id,language_id,language_name,language_price) VALUES (:memberID,:languageID,:langName,:price)";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":memberID", 1);
$statement2->bindValue(":languageID",$id);
$statement2->bindValue(":langName",$language_name);
$statement2->bindValue(":price",$language_price);
$statement2->execute();
$statement2->closeCursor();

echo "ok" ;




