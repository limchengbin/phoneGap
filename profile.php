<?php
require_once('include/database.php');

if (!isset($_SESSION['login_user'])) {
    header("Location: index.php");
    exit;
}
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
        <title>Profile</title>

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
        <link href="css/profilepic.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
        <![endif]-->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

        <style>
            #mainNav {
                background-color: black;
            }

            body{
                background-color: #eee;
            }

            .profile{
                background-color: #e0e0d1;
                margin-top: 220px;
                margin-bottom: 100px;
            }

            .header{
                height: 70px;
                text-align: left;
                font-size: 40px;
                border-bottom: solid 10px;
                border-color: #eee;
            }

            .profile_pic{
                background-color: #e0e0d1;
                height: 350px;
                border: solid 10px;
                border-color: #eee;
            }

            .details{
                height: 600px;
                width: 100%;
                margin-top: 20px;
            }

            #content{
                list-style-type: none;
                font-size: 20px;
            }

            #content li{
                padding-top: 35px;
            }

            #update{
                display: block;
                border-radius: 2px;
                background-color:  #6caee0;
                color: #ffffff;
                font-weight: bold;
                box-shadow: 1px 2px 4px 0 rgba(0, 0, 0, 0.08);
                padding: 15px 35px;
                border: 0;
                margin: 100px auto 0;
                cursor: pointer;
            }

            #update span {
                position: relative;
                transition: 0.5s;
            }

            #update span:after {
                content: '»';
                position: absolute;
                opacity: 0;
                top: 0;
                right: -20px;
                transition: 0.5s;
            }

            #update:hover span {
                padding-right: 25px;
            }

            #update:hover span:after {
                opacity: 1;
                right: 0;
            }

            #update:active{
                box-shadow: inset 0 0 0 1px #ff6600,inset 0 5px 30px #ff6600;
            }
        </style>
    </head>
    <body>
        <!-- Navigation -->
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
        <?php
        $email = $_SESSION['login_user'];

        $query = "SELECT * FROM member,member_details WHERE member.member_id =(SELECT member_id from member WHERE email = '$email')   and member.member_id=member_details.member_id";
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $result_array = $statement->fetchAll();
        $statement->closeCursor();

        $query2 = "SELECT language_id FROM payment_completed WHERE member_id = :id";
        $statement2 = $db->prepare($query2);
        $statement2->bindValue(":id", $_SESSION['memberID']);
        $statement2->execute();
        $result_array2 = $statement2->fetchAll();
        $statement2->closeCursor();

        $query3 = "SELECT * FROM language";
        $statement3 = $db->prepare($query3);
        $statement3->execute();
        $result_array3 = $statement3->fetchAll();
        $statement3->closeCursor();
        ?>
        <div class="container profile">
            <div class="col-md-8 header">Profile</div>
            <?php foreach ($result_array as $result): ?>
                <div class="col-md-4 profile_pic"><br><center><img id="profilepic" src="img/profilepic/<?php echo $result['profile_pic']; ?>" alt="Profile Picture" /></center></div>
                <br>

                <center>
                    <form action="profilePicUpdate.php" method="post" enctype="multipart/form-data">
                        <input class="buttoncss" id="file" type="file" name="picture" />
                        <label class="buttoncss2" for="file">Choose File</label>
                        <input type='hidden' name="member_id" value="<?php echo $result['member_id'] ?>"/>
                        <button class="buttoncss" id="submit" type="submit" name="submit">Upload</button>
                    </form>
                </center>


                <div class="col-md-8 details">
                    <ul id="content">

                        <li>Email: <?php echo $email; ?></li>
                        <li>First Name: <?php echo $result['firstname']; ?></li>
                        <li>Last Name: <?php echo $result['lastname']; ?></li>
                        <li>Mobile: <?php echo $result['mobile']; ?></li>
                        <li>First Language: <?php echo $result['firstlanguage']; ?></li>
                        <li>City: <?php echo $result['city']; ?></li>
                        <li>Country: <?php echo $result['country']; ?></li>
                    <?php endforeach; ?>

                    <li>Language:
                        <?php foreach ($result_array2 as $result2): ?>

                            <?php
                            for ($x = 0; $x < sizeof($result_array3); $x++) {
                                if ($result2['language_id'] == $result_array3[$x]['language_id'])
                                    echo $result_array3[$x]['language_name'];
                            }
                            ?>


                        <?php endforeach; ?>
                    </li>
                </ul>
                <a href="editprofile.php"><button id="update" type="button"><span>Update</span></button></a>
            </div>

        </div>



        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">&copy; 2017 JAB Language School ALL RIGHT RESERVED</span>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li><a href="#">Privacy Policy</a>
                            </li>
                            <li><a href="#">Terms of Use</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="js/agency.min.js"></script>

    </body>
</html>
