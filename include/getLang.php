<?php

require_once("database.php");

$query = "SELECT * from language;";
$statement = $db->prepare($query);
$statement->execute();
$language = $statement->fetchAll();
$statement->closeCursor();



