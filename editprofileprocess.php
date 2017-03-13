<?php

//if (empty($_SESSION['login_user'])) {
//    header("Location: editprofile.php");
//    exit;
//}

require_once('include/database.php');




$password = filter_input(INPUT_POST, 'registerpassword', FILTER_SANITIZE_STRING);
$confirmpassword = filter_input(INPUT_POST, 'confirmpassword', FILTER_SANITIZE_STRING);
$firstname = filter_input(INPUT_POST, 'yourFirstName', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, 'yourLastName', FILTER_SANITIZE_STRING);
$mobile = filter_input(INPUT_POST, 'yourMobile', FILTER_SANITIZE_STRING);
$firstlanguage = filter_input(INPUT_POST, 'firstLanguage', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
if ($password == $confirmpassword) {


    $query2 = "UPDATE member SET password= :password  WHERE email = :email";
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(":email", $email);
    $statement2->bindValue(":password", $hashed_password);
    $statement2->execute();
    $statement2->closeCursor();

    $query3 = "UPDATE member_details,member SET firstname= :firstname ,lastname=  :lastname ,mobile=:mobile, firstlanguage = :firstlanguage,city = :city,country= :country"
            . " WHERE member.member_id =(SELECT member_id from member WHERE email = '$email')   and member.member_id=member_details.member_id";
    $statement3 = $db->prepare($query3);
    $statement3->bindValue(":firstname", $firstname);
    $statement3->bindValue(":lastname", $lastname);
    $statement3->bindValue(":mobile", $mobile);
    $statement3->bindValue(":firstlanguage", $firstlanguage);
    $statement3->bindValue(":city", $city);
    $statement3->bindValue(":country", $country);
    $statement3->execute();
    $statement3->closeCursor();

    
    
    $_SESSION['user_status'] = $result['user_status'];
    if ($result['user_status'] == 1) {
        header("Location: profile.php");
    } else {
        header("Location: profile.php");
    }
    exit();
} else {
    $message = "The password does't match. Try it again";
}

if (isset($message)) {
    include ("register.php");
    exit();
}
