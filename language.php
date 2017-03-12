<?php
require_once("include/langDetail.php");

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
        <div id="lesson">
            <h1><?php echo $_SESSION['name'] ?></h1>
            <br>
            <h2><?php echo $language3[2] ?></h2>
        </div>
       
        <button id="previous" onclick="previous()" >previous</button>
        <button id="next" onclick="next()">next</button>
        
        
        
        
        
        
        <script src="js/jquery-1.11.2.js" type="text/javascript"></script>
        <script type="text/javascript">
            function previous() {
                
                $(document).ready(function () {
                    $.ajax({
                        url: "include/changeLesson.php",
                        type: "post",
                        
                        success: function (data) {
                            
                            $("#lesson").html(data);
                        }
                    });
                });
            }
            
            function next() {
                
                $(document).ready(function () {
                    $.ajax({
                        url: "include/nextLesson.php",
                        type: "post",
                        success: function (data) {
                            
                            $("#lesson").html(data);
                        }
                    });
                });
            }
        </script>



    </body>
</html>
