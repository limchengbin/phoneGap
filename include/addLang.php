<?php

require_once("database.php");


$id = $_POST['id'];



$query3 = "SELECT * from payment_completed WHERE language_id = :id AND member_id = :member";
$statement3 = $db->prepare($query3);
$statement3->bindValue(":id", $id);
$statement3->bindValue(":member", $_SESSION['memberID']);
$statement3->execute();
$check = $statement3->fetchAll();
$statement3->closeCursor();

$query4 = "SELECT * from myorder WHERE language_id = :id AND member_id = :member";
$statement4 = $db->prepare($query4);
$statement4->bindValue(":id", $id);
$statement4->bindValue(":member", $_SESSION['memberID']);
$statement4->execute();
$check2 = $statement4->fetchAll();
$statement4->closeCursor();


if (empty($check)) {
    if (empty($check2)) {
        $query = "SELECT * from language WHERE language_id = :id ";
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $lang = $statement->fetchAll();
        $statement->closeCursor();

        $language_name = $lang[0][1];
        $language_price = $lang[0][3];

        $query2 = "INSERT INTO myorder (member_id,language_id,language_name,language_price) VALUES (:memberID,:languageID,:langName,:price)";
        $statement2 = $db->prepare($query2);
        $statement2->bindValue(":memberID", $_SESSION['memberID']);
        $statement2->bindValue(":languageID", $id);
        $statement2->bindValue(":langName", $language_name);
        $statement2->bindValue(":price", $language_price);
        $statement2->execute();
        $statement2->closeCursor();

        echo "language added";
    } else {
        echo "language is in the basket";
    }
} else {
     echo "../language.php";
}



