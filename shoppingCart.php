<?php
require_once("include/shoppingList.php");
$_SESSION['total_price'] = 0;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <link href="css_sc/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css_sc/custom.css" rel="stylesheet" type="text/css"/>
        <script src="https://use.fontawesome.com/f3f6cae6fd.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    </head>

    <body>



        <div class="container-fluid breadcrumbBox text-center">
            <ol class="breadcrumb">
                <li class="active"><a>Order</a></li>
                <li  class="active"><a>Payment</a></li>
            </ol>
        </div>

        <div class="container text-center">

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

            function payment(price) {

                $(document).ready(function () {
                    $.ajax({
                        url: "includes/make_order.php",
                        type: "post",
                        data: {
                            price: price
                        },
                        success: function (data) {
                            alert("order made");
                            window.location = "index.php";
                        }
                    });
                });
            }


        </script>

    </body>
</html>
