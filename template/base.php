<!DOCTYPE html>

<html lang="en">
  <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <?php if(isset($templateParams["css"])): ?>
          <?php for($i = 0; $i < count($templateParams["css"]); $i++): ?>
            <link href="<?php echo $templateParams["css"][$i] ?>" rel="stylesheet" type="text/css">
          <?php endfor; ?>
        <?php endif; ?>
        <!-- <link href="css/mainPageStyle.css" rel="stylesheet" type="text/css" > -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title><?php echo $templateParams["titolo"]; ?></title>
        <link rel="icon" type="image/x-icon" href="favicon/favicon.ico">
  </head>
    <body>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="jsUtils/jquery-1.11.3.min.js" type="text/javascript"></script>
      <!-- <script type="text/javascript" src="../javascript/setNavbar.js"></script> -->
      <!-- <script src="javascript/mainPage.js" type="text/javascript"></script> -->

      <main>
        <header id="myHeader">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <img src="images/LOGO/D-SOUND SYSTEM.png" id="logoImg">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>  
                <div class="collapse navbar-collapse" id="navbarScroll">
                  <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;" id="navbarLinkContainer">
                    <li class="nav-item">
                      <a class="btn btn-secondary" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">
                        Home
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../webProject/cartPage.php">Carrello</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../webProject/whoWeAre.php">Chi siamo?</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="html/contactsPage.html">Contatti</a>
                    </li>
                  </ul>
                 
                      <div class="dropdown text-end" id="dropDownNotification">

                        <img src="images/notificationIcon.png" alt="notificationImage" id="notificationImage" class="rounded-circle">
                        <?php if(isUserHasNotifies()): ?>
                          <p id ="notificationCounter"><?php echo $_SESSION["NotifiesNumber"] ?> </p>  
                        <?php endif; ?>
                        
                        <ul class="dropdown-menu text-small aria-hidden" id="dropnotify" aria-labelledby="dropdownUser1" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-20px, 34px);" >
                            <div class="notification" id="panelNotify">
                              <img src="images/bellnotify.png" alt="bellNotify" id="bellImage" >
                            </div>
                            <?php if (!isUserLoggedIn()): ?>
                                <div class="card-body" id="notificationCard">
                                  <p class="card-text">Log-in to see your notifies</p>
                                </div>
                            <?php endif; ?>

                            <?php if (isUserHasNotifies() && isUserLoggedIn()): ?>
                              <?php foreach($templateParams["notifies"] as $key): ?>
                                <div class="card-body" id="notificationCard">
                                    <p><?php echo $key["data"]?></p>
                                    <p><?php echo $key["testo"]?></p>
                                </div>
                              <?php endforeach; ?>
                            <?php endif; ?>
                            <a href="./notifies.php" >See all</a>
                        </ul>

                        



                      </div>
                      <div class="dropdown text-end">
                          <img src="images/account-circle.png" alt="loginImage" id="loginImage" class="rounded-circle">
                        <ul class="dropdown-menu text-small aria-hidden" aria-labelledby="dropdownUser1" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-20px, 34px);" data-popper-placement="bottom-end">
                        <?php if(!isUserLoggedIn()): ?>
                          <li><a class="dropdown-item" href="./loginPage.php">Accedi</a></li>
                        <?php endif; ?>
                        <?php if(isUserLoggedIn() && isUserVendor()): ?>
                          <li><p class="dropdown-item"><?php echo $_SESSION["Nome"]." ".$_SESSION["Cognome"]; ?></p></li>
                          <li><a class="dropdown-item" href="./listPage.php">I miei Prodotti</a></li>
                          <li><a class="dropdown-item" href="./listOrderPage.php">I miei Acquisti</a></li>
                          <li><a class="dropdown-item" href="./index.php?action=logout">Logout</a></li>
                        <?php endif; ?>
                        <?php if(isUserLoggedIn() && !isUserVendor()): ?>
                          <li><a class="dropdown-item"><?php echo $_SESSION["Nome"]." ".$_SESSION["Cognome"]; ?></a></li>
                          <li><a class="dropdown-item" href="./listOrderPage.php">I miei Acquisti</a></li>
                          <li><a class="dropdown-item" href="./index.php?action=logout">Logout</a></li>
                        <?php endif; ?>
                        </ul>
                      </div>
                
                </div>
            </div>
          </nav>
        </header>

        <!-- qua va il codice dinamico -->
        <?php
          if(isset($templateParams["pagereq"])){
            require($templateParams["pagereq"]);
          }
        ?>
      </main>
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top" id="myFooter">
          <div class="col-md-4 d-flex align-items-center mx-2">
          <p id="info" fg="blue">
              Partita IVA: 0125469874<br>
              Capitale Sociale: 500'000€<br>
              © 2021 D-Sound System Company, Inc<br>
        </p>
          </div>
      
          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex mx-2">
            <li class="ms-3"><a class="text-muted" href="https://www.whatsapp.com/"><img class="bi" width="24" height="24" src="images/whatsapp.svg"></a></li>
            <li class="ms-3"><a class="text-muted" href="https://wwww.facebook.com/"><img class="bi" width="24" height="24" src="images/facebook.svg"></a></li>
            <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/"><img class="bi" width="24" height="24" src="images/instagram.svg"></a></li>
          </ul>
        </footer>
      </body>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
      <script type="text/javascript "src="./jsUtils/header.js"></script>
      <script type="text/javascript "src="javascript/ajaxutils.js"></script>
</html> 
