<?php

require_once("database.php");

$query = "SElECT * from language;";
$statement = $db->prepare($query);
$statement->execute();
$language = $statement->fetchAll();
$statement->closeCursor();
