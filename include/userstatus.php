<?php

if (isset($_SESSION['login_user'], $_SESSION['user_status']) && $_SESSION['user_status'] == 0) {
    echo "<a class='menuimg' href='myprofile.php'>Welcome, <strong>" . $_SESSION['login_user'] . "</strong>&nbsp;&nbsp;&nbsp;&nbsp;</a>";
} else if (isset($_SESSION['login_user'], $_SESSION['user_status']) && $_SESSION['user_status'] == 1) {
    echo "<a class='menuimg' href='profile.php'>Welcome, Admin <strong>" . $_SESSION['login_user'] . "</strong>&nbsp;&nbsp;&nbsp;&nbsp;</a>";
}