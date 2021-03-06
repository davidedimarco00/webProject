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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title><?php echo $templateParams["titolo"]; ?></title>
        <link rel="icon" type="image/x-icon" href="favicon/favicon.ico">
  </head>
    <body>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="jsUtils/jquery-1.11.3.min.js" type="text/javascript"></script>

      <main>
        <header id="myHeader">
          <nav class="navbar navbar-collapse-lg navbar-light bg-light">
            <div class="container-fluid">
              <img src="images/LOGO/D-SOUND SYSTEM.png" id="logoImg">
              <div class="expand navbar-expand">
                <ul class="navbar-nav me-auto my-2">
                  <li class="nav-item">
                    <a class="btn btn-secondary" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">
                      Home
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../webProject/cartPage.php">Carrello</a>
                  </li>
                </ul>
              </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleContent" aria-controls="navbarToggleContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
            </div>
            <div class="collapse" id="navbarToggleContent">
              <div>
                <ul class="aria-hidden float-end">
                <?php if(!isUserLoggedIn()): ?>
                  <li class="nav-item"><a class="dropdown-item" href="./loginPage.php">Accedi</a><img src="images/account-circle.png" alt="loginImage" id="loginImage" class="rounded-circle"></li>
                <?php endif; ?>
                <?php if(isUserLoggedIn()): ?>
                  <li class="nav-item">
                    <a class="dropdown-item"><?php echo $_SESSION["Nome"]." ".$_SESSION["Cognome"]; ?></a><img src="images/account-circle.png" alt="loginImage" id="loginImage" class="rounded-circle">
                    </li>
                  <li class="nav-item"> <a class="dropdown-item" href="./notifies.php" >Vedi tutte le notifiche</a><img src="images/notificationIcon.png" alt="notificationImage" id="notificationImage" class="rounded-circle">
                  </li>
                  <?php if(isUserLoggedIn() && isUserVendor()): ?>
                  <li class="nav-item"><a class="dropdown-item" href="./listPage.php">I miei Prodotti</a></li>
                  <?php endif; ?>
                  <li class="nav-item"><a class="dropdown-item" href="./listOrderPage.php">I miei Acquisti</a></li>
                  <li class="nav-item"><a class="dropdown-item" href="./index.php?action=logout">Logout</a></li>
                <?php endif; ?>
                </ul>
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
      <footer class="justify-content-between align-items-center py-3 border-top" id="myFooter">
        <div class="col-md-4 d-flex align-items-center mx-2">
          <p id="info">
            Partita IVA: 0125469874<br>
            Capitale Sociale: 500'000???<br>
            ?? 2021 D-Sound System Company, Inc<br>
          </p>
        </div>
    
      </footer>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript "src="./jsUtils/header.js"></script>
    <script type="text/javascript "src="javascript/ajaxutils.js"></script>
    <script type="text/javascript "src="javascript/mainPage.js"></script>
</html> 
