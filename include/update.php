<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$query3 = "UPDATE member_details SET firstname = :firstname,lastname = :lastname,mobile = : mobile,firstlanguage = :firstlanguage,city = :city,country = :country WHERE member_id = :id; ";
        $statement3 = $db->prepare($query3);
        $statement3->bindValue(":firstname", $firstname);
        $statement3->bindValue(":lastname", $lastname);
        $statement3->bindValue(":mobile", $mobile);
        $statement3->bindValue(":firstlanguage", $firstlanguage);
        $statement3->bindValue(":city", $city);
        $statement3->bindValue(":country", $country);
        $statement3 ->bindValue(":id",3);
        $statement3->execute();
        $statement3->closeCursor();