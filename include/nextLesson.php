<?php
require_once("database.php");


if($_SESSION['current']>0 && $_SESSION['current'] <5){
    $_SESSION['current'] = $_SESSION['current'] +1 ;
}


$test = "UPDATE payment_completed SET current_lesson = " .$_SESSION['current']. " WHERE language_id = " . $_SESSION['language_id'] . " AND member_id = " . $_SESSION['memberID'] ;


$query4 = $test;
$statement4 = $db->prepare($query4);
$statement4->execute();
$statement4->closeCursor();

$test = "SELECT * FROM " . $_SESSION['name'] . " WHERE id=" . $_SESSION['current'] ;

$query7 = $test;
$statement7 = $db->prepare($query7);
$statement7->execute();
$language7 = $statement7->fetch();
$statement7->closeCursor();
 




echo '<h1>'. $_SESSION['name'] .'</h1>
            <br>
            <h2>'. $language7[2] .'</h2>';

