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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title></title>
        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Java Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Theme CSS -->
        <link href="css/agency.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
        <![endif]-->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

        <style>
            #mainNav{
                background-color: black;
            }

            #board{
                background-image: url("img/chalkboard-bg.jpg");
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                position: absolute;
                margin-right: 200px;
                margin-top: 200px;
                height: 60%;
                width: 100%;
            }

            body{
                background-color: #eee;
            }

            #board h1{
                text-align: center;
                color: white;
            }

            #board h2{
                text-align: center;
                color: white;
            }

            #previous, #next{
                margin-top: 150px;
            }

            #previous, #next{
                display: block;
                border-radius: 2px;
                background-color:  #6caee0;
                color: #ffffff;
                font-weight: bold;
                box-shadow: 1px 2px 4px 0 rgba(0, 0, 0, 0.08);
                padding: 15px 35px;
                border: 0;
                margin: 50px auto 0;
                cursor: pointer;
            }

            #previous span, #next span {
                position: relative;
                transition: 0.5s;
            }

            #previous span:after{
                content: '«';
                position: absolute;
                opacity: 0;
                top: 0;
                left: -20px;
                transition: 0.5s;
            }

            #next span:after {
                content: '»';
                position: absolute;
                opacity: 0;
                top: 0;
                right: -20px;
                transition: 0.5s;
            }

            #previous:hover span{
                padding-left: 25px;
            }

            #next:hover span {
                padding-right: 25px;
            }

            #next:hover span:after {
                opacity: 1;
                right: 0;
            }

            #previous:hover span:after{
                left: 0;
                opacity: 1;
            }

            #previous:active, #next:active{
                box-shadow: inset 0
                </style>
            </head>
            <body>
                <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header page-scroll">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                            </button>
                            <a id="movelogo" class="navbar-brand page-scroll" href="index.php#page-top"><img src="img/logos/jablogo2.png" style="width: 125px;"/></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li>
                                <?php include('include/userstatus.php'); ?>
                            </li>
                            <li>                        
                                <?php include('include/loginlogout.php'); ?>
                            </li>
                            <li>
                                <a class="page-scroll" href="index.php#portfolio">Courses</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="index.php#team">Team</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="index.php#contact">Contact</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="shoppingCart.php">Shopping Cart</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

            <div class="container">
                <div class="row">
                    <div id="board" class="col-md-8">
                        <h1><?php echo $_SESSION['name'] ?></h1>
                        <br>
                        <h2><?php echo $language3[2] ?></h2>


                        <center>
                            <button id="previous" onclick="previous()" ><span>previous</span></button>
                            <button id="next" onclick="next()"><span>next</span></button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="js/jquery-1.11.2.js" type="text/javascript"></script>
    <script type="text/javascript">
                                function previous() {

                                    $(document).ready(function () {
                                        $.ajax({
                                            url: "include/changeLesson.php",
                                            type: "post",
                                            success: function (data) {

                                                $("#board").html(data);
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

                                                $("#board").html(data);
                                            }
                                        });
                                    });
                                }
    </script>


</html>
