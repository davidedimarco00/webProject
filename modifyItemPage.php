<?php
    require_once 'bootstrap.php';

    //Home Template
    $templateParams["css"] = array("css/header.css", "css/footer.css");
    $templateParams["titolo"] = "Products";
    $templateParams["pagereq"] = "template/modifyitemTemplate.php";

    $templateParams["item"]=$dbh->getAllProducts()[0];
    $templateParams["categories"]=$dbh->getCategories();
    require 'template/base.php';
?> 
