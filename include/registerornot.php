<?php
session_start();

if (isset($_SESSION['login_user'])) {
    header("Location:../notsignin2.php");
    
} else {
    header("Location: ../register.php");
}



