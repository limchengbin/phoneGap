<?php
require_once("include/getLang.php")
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        for ($x = 0; $x < sizeof($language); $x++) {
                echo $language[$x]['language_name'];
                echo $language[$x]['language_price'];
                echo '<img src="img/'. $language[$x]["language_bgpic"].'" alt=""/>';
               
        }
        ?>
    </body>
</html>
