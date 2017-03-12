<?php

require_once("include/database.php");



$String = '';
$id = $_POST['id'];

$query = "DELETE FROM myorder WHERE language_id = :id";
$statement = $db->prepare($query);
$statement->bindValue(":id", $id);
$statement->execute();
$statement->closeCursor();

$query2 = "SELECT * FROM myorder";
$statement2 = $db->prepare($query2);
$statement2->execute();
$list = $statement2->fetchAll();
$statement2->closeCursor();

unset($_SESSION['total_price']);
$_SESSION['total_price'] = 0;



if (!empty($list)) {
    foreach ($list as $list):
        $String .= '<li class="row">
                    <span class="itemName">' . $list["language_name"] . '</span>
                    <span class="delete"><a style="font-size:30px;" onclick="deleteList(' . $list["language_id"] . ')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>
                    <span class="price">' . $list["language_price"] . '</span>
                     </li>';
    $_SESSION['total_price'] += $list['language_price'];
    endforeach;
    $String .= '<li class="row">
                <span class="quantity"></span>
                <span class="itemName" style="font-family:"Acme",cursive;color:black;font-size: 17px;">Total Price</span>
                <span class="delete"></span>
                <span class="price" style="font-family: "Acmet", cursive;color:black;">' . $_SESSION["total_price"] . '</span>
                </li>';
    
    
    $String .= '<form action = "include/addList.php" style = "text-align: center" method = "post">
               <script
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
}else {
    $String = "There Are No More Product";
}
echo $String;
