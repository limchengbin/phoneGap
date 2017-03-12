<?php
require_once("include/shoppingList.php");
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
        
        <?php foreach ($list as $list) : ?>
        <?php echo $list['language_name'] ?>
        <?php echo "\t\t" ?>
        <?php echo $list['language_price'] ?>
        <br>
        <?php endforeach; ?>
        <br>
        <?php echo $_SESSION['total_price'] ;?>
        
        
        <br><br>
        
        <form action="include/addList.php" method="POST">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_ij3ByUQXlcvwJhbUSPkoqMPf"
                data-amount="<?php echo $_SESSION['total_price']*100 ?>"
                data-name="JAB"
                data-description="language costs"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-zip-code="true"
                data-currency="eur">
            </script>
        </form>
    </body>
</html>
