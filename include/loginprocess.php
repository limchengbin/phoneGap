<?php

if (isset($_SESSION['login_user'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['email'])) {


    require_once('database.php');

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $query = "SELECT * FROM member WHERE email=:email";
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $result_array = $statement->fetchAll();
        $statement->closeCursor();
        

        if (count($result_array)) {
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            foreach ($result_array as $result):

                if (password_verify($result['password'], $hashed_password)) {
                    $message = "Either the email or password is incorrect. Try it again.";
                } else {
                    session_start();
                    $_SESSION['login_user'] = $email;
                    $_SESSION['user_status'] = $result['user_status'];
                    if ($result['user_status'] == 1) {
                        header("Location:profile.php");
                        
                    } else {
                        header("Location:myprofile.php");
                    }
                    exit();
                }
            endforeach;
        } else {
            $message = "Either the email or password is incorrect. Try it again.";
        }
    } else {
        if (count($form_errors) == 1) {
            $message = "There was one error in the form";
        } else {
            $message = "There were " . count($form_errors) . " errors in the form";
        }
    }


if (isset($message)) {
    include ("index.php");
    exit();
}