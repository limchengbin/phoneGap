<?php

require_once("database.php");

$query = "SElECT * FROM myorder where member_id = :id";
$statement = $db->prepare($query);
$statement->bindValue(":id", $_SESSION['memberID']);
$statement->execute();
$list = $statement->fetchAll();
$statement->closeCursor();


foreach ($list as $list):
    $query2 = "INSERT INTO payment_completed (language_id,member_id,current_lesson) VALUES (:langID,:memberID,:index);";
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(":langID", $list['language_id']);
    $statement2->bindValue(":memberID", $list['member_id']);
    $statement2->bindValue(":index",1);
    $statement2->execute();
    $statement2->closeCursor();
endforeach;

$query3 = "DELETE FROM myorder where member_id= :memberID";
$statement3 = $db->prepare($query3);
$statement3-> bindValue(":memberID" ,$_SESSION['memberID']);
$statement3->execute();
$statement3->closeCursor();



echo "<SCRIPT type='text/javascript'> 
        alert('order made');
        window.location = '../index.php'
    </SCRIPT>";