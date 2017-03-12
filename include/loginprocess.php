<?php


require_once '../includes/database.php';
//include_once '../validate.php';
//include_once '../session.php';

$form_errors = array();
$required_fields = array('username', 'password');
$form_errors = array_merge($form_errors, check_empty_fields($required_fields));
$fields_to_check_length = array('username' => 3, 'password' => 8);
$form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

if (empty($form_errors)) {
    $username = FILTER_INPUT(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = FILTER_INPUT(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    
    //check if user exist in the database
    $query = "SELECT * FROM members WHERE username = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();

    //If row exists (returned)
    if (!empty($row)) {
        //get hashed password          
        $hashed_password = $row['password'];
        //get member ID
        $id = $row['memberID'];

        //get username
        $username = $row['username'];
        //get email
        $email = $row['email'];
        //get userType
        $userType = $row['userType'];
        
        if (password_verify($password, $hashed_password)) {
            //echo "2";die();
            session_start();
            $_SESSION['memberID'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['userType'] = $userType;
            
            //header("location: ../home.php");
        } else {
            $form_errors[] = "Invalid Password";
            //include ("../login/login.php");
        }
    } else {
        $form_errors[] = "Invalid Account";
        //include("../login/login.php");
        exit();
    }
} else {
    //header("location: ../login/login.php");
    //include ('../login/login.php');
    exit();
}
?>
