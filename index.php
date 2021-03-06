<?php
require_once("include/getLang.php");
require_once("include/checkStatus.php");

if (!isset($message)) {
    $message = "";
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>JAB Online Language School</title>

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

    </head>

    <body id="page-top" class="index">

        <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
        <script>
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                    $('#return-to-top').fadeIn(200);    // Fade in the arrow
                } else {
                    $('#return-to-top').fadeOut(200);   // Else fade out the arrow
                }
            });
            $('#return-to-top').click(function () {      // When arrow is clicked
                $('body,html').animate({
                    scrollTop: 0                       // Scroll to top of body
                }, 500);
            });
        </script>


        <!-- Navigation -->
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
                            <a class="page-scroll" href="#team">Team</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Contact</a>
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

        <!-- Header -->
        <header>
            <div class="container">
                <div class="intro-text">
                    <div class="intro-heading">Learn New Languages Online</div>
                    <div class="intro-lead-in">"The limits of my language are the limits of my world"</div>
                    <a href="#portfolio" class="page-scroll btn btn-xl">Start Now</a>
                    <br>
                    <div class="intro-lead-in" id="messageDisplay"><?php echo $message; ?></div>
                </div>
            </div>
        </header>

        <script>
            function addProduct(id) {
                $(document).ready(function () {
                    $.ajax({
                        url: "include/addLang.php",
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function (data) {
                            if (data === "../language.php") {
                                window.location = "courses.php?id=" + id;
                            } else {

                                $("#alert_template button").after('<span>~' + data + '</span><br>');
                                $('#alert_template').fadeIn('fast');

                                $('#alert_template .close').click(function (e) {
                                    $('#alert_template').fadeOut('fast');
                                    $("#alert_template span").remove();
                                    $("#alert_template br").remove();
                                });
                            }
                        }

                    });
                });
            }


        </script>
        <!-- Portfolio Grid Section -->
        <section id="portfolio" class="bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Language Courses</h2>
                        <h3 class="section-subheading text-muted">Pick a course in a worth deal...</h3>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($language as $language) : ?>
                        <?php
                        if (isset($_SESSION['memberID'])) {
                            echo '<div class = "alert alert-info" id = "alert_template" style = "display: none;">
                            <button type = "button" class = "close">×</button>
                             </div>';
                        }
                        ?>
                        <div  class="col-md-4 col-sm-6 portfolio-item">   
                            <a href="" onclick="addProduct(<?php echo $language['language_id'] ?>);" class="portfolio-link" data-toggle="modal">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fa fa-p lus fa-3x"></i>
                                    </div>
                                </div>
                                <img src="img/language/<?php echo $language['language_bgpic'] ?>" class="img-responsive" alt="">
                            </a>
                            <div class="portfolio-caption">
                                <h4><?php echo $language['language_name'] ?></h4>
                                <h5><?php echo $language['language_des'] ?>
                                    <?php
                                    if (isset($_SESSION['memberID'])) {
                                        $x = 0;
                                        $match = false;
                                        while ($x < sizeof($lang)) {

                                            if ($lang[$x]['language_id'] == $language['language_id']) {
                                                $match = true;
                                            }
                                            $x++;
                                        }
                                        if ($match) {
                                            echo "(bought)";
                                        }
                                    }
                                    ?>
                                </h5>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    </section>

                    <!-- Team Section -->
                    <section id="team" class="bg-light-gray">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h2 class="section-heading">Our Amazing Team</h2>
                                    <h3 class="section-subheading text-muted"></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="team-member">
                                        <img src="img/team/jin.jpg" class="img-responsive img-circle" alt="">
                                        <h4>Jin</h4>
                                        <p class="text-muted">Front-end, Back-end helper</p>
                                        <ul class="list-inline social-buttons">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="team-member">
                                        <img src="img/team/alvin.jpg" class="img-responsive img-circle" alt="">
                                        <h4>Alvin</h4>
                                        <p class="text-muted">Front-end designer, Database builder</p>
                                        <ul class="list-inline social-buttons">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="team-member">
                                        <img src="img/team/bin.jpg" class="img-responsive img-circle" alt="">
                                        <h4>Handsome Bin</h4>
                                        <p class="text-muted">PHP connection, Data Display</p>
                                        <ul class="list-inline social-buttons">
                                            <li><a href="https://twitter.com/limchengbin?lang=en" target="_blank"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="https://www.facebook.com/binny95?ref=bookmarks" target="_blank"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="https://www.linkedin.com/in/cheng-bin-lim-4168ba107/" target="_blank"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2 text-center">
                                    <p class="large text-muted">The best and tacit team ever!</p>
                                </div>
                            </div>
                        </div>
                    </section>


                    <!-- Contact Section -->
                    <section id="contact">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h2 class="section-heading">Contact Us</h2>
                                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form name="sentMessage" id="contactForm" novalidate>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="form-group">
                                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-lg-12 text-center">
                                                <div id="success"></div>
                                                <button type="submit" class="btn btn-xl">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>

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

                    <!-- Portfolio Modals -->
                    <!-- Use the modals below to showcase details about your portfolio projects! -->

                    <!-- Portfolio Modal 1 -->
                    <?php foreach ($language as $language) : ?>
                        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="close-modal" data-dismiss="modal">
                                        <div class="lr">
                                            <div class="rl">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8 col-lg-offset-2">
                                                <div class="modal-body">
                                                    <!-- Project Details Go Here -->

                                                    <h2><?php echo $language['language_name'] ?>Read from database(language)</h2>
                                                    <p class="item-intro text-muted">other language</p>
                                                    <img class="img-responsive img-centered" src="img/portfolio/roundicons-free.png" alt="">
                                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                                    <p>
                                                        <strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">RoundIcons.com</a>, or you can purchase the 1500 icon set <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">here</a>.</p>
                                                    <ul class="list-inline">
                                                        <li>Date: July 2014</li>
                                                        <li>Client: Round Icons</li>
                                                        <li>Category: Graphic Design</li>
                                                    </ul>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- Portfolio Modal 2 -->
                    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-dismiss="modal">
                                    <div class="lr">
                                        <div class="rl">
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="modal-body">
                                                <h2>Project Heading</h2>
                                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                                <img class="img-responsive img-centered" src="img/portfolio/startup-framework-preview.png" alt="">
                                                <p><a href="http://designmodo.com/startup/?u=787">Startup Framework</a> is a website builder for professionals. Startup Framework contains components and complex blocks (PSD+HTML Bootstrap themes and templates) which can easily be integrated into almost any design. All of these components are made in the same style, and can easily be integrated into projects, allowing you to create hundreds of solutions for your future projects.</p>
                                                <p>You can preview Startup Framework <a href="http://designmodo.com/startup/?u=787">here</a>.</p>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Modal 3 -->
                    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-dismiss="modal">
                                    <div class="lr">
                                        <div class="rl">
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="modal-body">
                                                <!-- Project Details Go Here -->
                                                <h2>Project Name</h2>
                                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                                <img class="img-responsive img-centered" src="img/portfolio/treehouse-preview.png" alt="">
                                                <p>Treehouse is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. This is bright and spacious design perfect for people or startup companies looking to showcase their apps or other projects.</p>
                                                <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/treehouse-free-psd-web-template/">FreebiesXpress.com</a>.</p>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Modal 4 -->
                    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-dismiss="modal">
                                    <div class="lr">
                                        <div class="rl">
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="modal-body">
                                                <!-- Project Details Go Here -->
                                                <h2>Project Name</h2>
                                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                                <img class="img-responsive img-centered" src="img/portfolio/golden-preview.png" alt="">
                                                <p>Start Bootstrap's Agency theme is based on Golden, a free PSD website template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Golden is a modern and clean one page web template that was made exclusively for Best PSD Freebies. This template has a great portfolio, timeline, and meet your team sections that can be easily modified to fit your needs.</p>
                                                <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/golden-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Modal 5 -->
                    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-dismiss="modal">
                                    <div class="lr">
                                        <div class="rl">
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="modal-body">
                                                <!-- Project Details Go Here -->
                                                <h2>Project Name</h2>
                                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                                <img class="img-responsive img-centered" src="img/portfolio/escape-preview.png" alt="">
                                                <p>Escape is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Escape is a one page web template that was designed with agencies in mind. This template is ideal for those looking for a simple one page solution to describe your business and offer your services.</p>
                                                <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/escape-one-page-psd-web-template/">FreebiesXpress.com</a>.</p>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Modal 6 -->
                    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-dismiss="modal">
                                    <div class="lr">
                                        <div class="rl">
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="modal-body">
                                                <!-- Project Details Go Here -->
                                                <h2>Project Name</h2>
                                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                                <img class="img-responsive img-centered" src="img/portfolio/dreams-preview.png" alt="">
                                                <p>Dreams is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Dreams is a modern one page web template designed for almost any purpose. It’s a beautiful template that’s designed with the Bootstrap framework in mind.</p>
                                                <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/dreams-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

