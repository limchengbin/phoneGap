<?php

if (isset($_SESSION['login_user'])) {
    echo '<a class="page-scroll" href="./logout.php"><img src="img/logout.png" style="width:30px;" /></a>';
} else {
    echo '<a class="page-scroll" href="#" id="loginform"><img src="img/loginuser.png" style="width:30px;" /></a>';
    echo '<div class="login">';
    echo '<div class="arrow-up"></div>';
    echo '<div class="formholder">';
    echo '<div class="randompad">';
    echo '<fieldset>';
    echo '<form name="login" action="loginprocess.php" method="post">';
    echo '<label>Email</label>';
    echo '<input required name="email" type="email" placeholder="example@example.com" />';
    echo '<label>Password</label>';
    echo '<input required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" type="password" />';
    echo '<input type="submit" value="Login" />';
    echo '<a  id="regbutton" href="register.php"><input type="button" value="Register" /></a>';
    echo '</form>';
    echo '</fieldset>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<script src="js/loginjv.js" type="text/javascript"></script>';
}
?>



