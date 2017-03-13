<?php

if (isset($_SESSION['login_user'])) {
    echo "<a class='menuimg' href='profile.php'>Welcome, <strong>" . $_SESSION['login_user'] . "</strong>&nbsp;&nbsp;&nbsp;&nbsp;</a>";
} else if (isset($_SESSION['login_user'])) {
    echo "<a class='menuimg' href='profile.php'>Welcome, Admin <strong>" . $_SESSION['login_user'] . "</strong>&nbsp;&nbsp;&nbsp;&nbsp;</a>";
}