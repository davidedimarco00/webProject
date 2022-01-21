<?php
    require_once 'bootstrap.php';

    //Home Template
    $templateParams["css"] = array("css/loginPage.css", "css/header.css", "css/footer.css");
    $templateParams["titolo"] = "Login Page";
    $templateParams["pagereq"] = "template/loginPageTemplate.php";

    //Placeholder Templates: da sostituire con le query al database

    require 'template/base.php';
?> 