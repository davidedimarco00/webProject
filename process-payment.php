<?php
    require_once "bootstrap.php";

    $date=date("Y,m,d");
    $deliver="UPS";

    $CodCarrello =$dbh->getCart($_SESSION["Nickname"]);

    $dbh->disableCart();

    $CodOrdine = $dbh->insertOrder($CodCarrello,$date);

    $CodFattura = $dbh->insertBilling($CodOrdine, $_POST["name"], $_POST["surname"],$_POST["username"], $_POST["email"], ($_POST["address"] . $_POST["address2"] . $_POST["country"]), $_POST["zip"]);

    $CodNotifica = $dbh->insertNotify($date, "Your order is confirmed", $_SESSION["Nickname"]);
?> 