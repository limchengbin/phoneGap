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
            echo '<img src="img/' . $language[$x]["language_bgpic"] . '" alt=""/>';
            echo '<button onclick="addLang(' . $language[$x]["language_id"] . ')"> Press Me </button>';
        }
        ?>



        <form action="" method="POST">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_ij3ByUQXlcvwJhbUSPkoqMPf"
                data-amount="2000"
                data-name="Demo Site"
                data-description="2 widgets"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-zip-code="true"
                data-currency="eur">
            </script>
        </form>
        <script src="js/jquery-1.11.2.js" type="text/javascript"></script>
        <script type="text/javascript">

                    function addLang(id) {

                        $(document).ready(function () {
                            $.ajax({
                                url: "include/addLang.php",
                                type: "post",
                                data: {
                                    id: id
                                },
                                success: function (data) {
                                    alert("success");
                                }

                            });
                        });
                    }

        </script>
    </body>
</html>
