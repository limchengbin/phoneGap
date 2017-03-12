<?php
require_once("include/shoppingList.php");
$_SESSION['total_price'] = 0;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <link href="css_sc/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css_sc/custom.css" rel="stylesheet" type="text/css"/>
        <script src="https://use.fontawesome.com/f3f6cae6fd.js"></script>

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
        <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
        <style>
            #mainNav{
                background-color: black;
            }

            .cart{
                margin-top: 300px;
            }
            
            footer{
                margin-top: 100px;
            }
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
                    <a id="movelogo" class="navbar-brand page-scroll" href="#page-top"><img src="img/logos/jablogo2.png" style="width: 125px;"/></a>
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
                            <a class="page-scroll" href="#portfolio">Courses</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#about">About</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#team">Team</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <div class="container cart text-center">

            <div class="col-md-5 col-sm-12">
                <div class="bigcart"></div>
                <h1>Your shopping cart</h1>
                <?php
                if (!isset($_SESSION['user'])) {
                    echo 'You Must Log In or Register To Place Order';
                }
                ?>

            </div>

            <div class="col-md-7 col-sm-12 text-left">
                <ul>
                    <li class="row list-inline columnCaptions">

                        <span>ITEM</span>
                        <span>Price</span>
                    </li>
                    <div id="output">
                        <?php
                        if (!empty($list)) {
                            foreach ($list as $list): echo '<li class="row">';

                                echo '<span class="itemName">' . $list["language_name"] . '</span>';
                                echo '<span class="delete"><a style="font-size:30px;" onclick="deleteList(' . $list["language_id"] . ')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>';
                                echo '<span class="price">' . $list["language_price"] . '</span>';

                                echo '</li>';
                                $_SESSION['total_price'] += $list['language_price'];
                            endforeach;

                            echo '<li class="row">
                            <span class="quantity"></span>';
                            echo '<span class="itemName" id="item" style="font-family: "Acme", cursive;color:black;font-size: 17px;">Total Price</span>';
                            echo '<span class="delete"></span>';
                            echo '<span class="price " id="homemade" style="font-family: "Acmet", cursive;color:black;">' . $_SESSION['total_price'] . '</span>';
                            echo '</li>';

//                            if (isset($_SESSION['user'])) {
                            echo '<form action = "include/addList.php" style = "text-align: center" method = "post">';
                            echo '<script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_test_ij3ByUQXlcvwJhbUSPkoqMPf"
                                data-amount="' . $_SESSION['total_price'] * 100 . '"
                                data-name="JAB"
                                data-description="language costs"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto"
                                data-zip-code="true"
                                data-currency="eur">
                                </script></form>';
//                        }
                        } else {
                            echo "There are is product in cart";
                        }
                        ?>

                    </div>
                </ul>
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



        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="js_sc/bootstrap.min.js" type="text/javascript"></script>
        <script src="js_sc/customjs.js" type="text/javascript"></script>
        <script type="text/javascript">
            function deleteList(id) {

                $(document).ready(function () {
                    $.ajax({
                        url: "delete_item.php",
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function (data) {
                            $("#output").html(data);
                        }
                    });
                });
            }

            


        </script>


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
