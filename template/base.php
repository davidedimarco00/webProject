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
                      <a class="btn btn-secondary" href="./webProject/index.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Home
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="html/cartPage.html">Carrello</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="html/chisiamo.html">Chi siamo?</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="html/contactsPage.html">Contatti</a>
                    </li>
                  </ul>
                  <div class="form-inline my-2 my-lg-0">
                    <form class="d-flex">
                      <input class="form-control me-2" type="search" placeholder="Cerca" aria-label="Search">
                      <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle hide" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="images/account-circle.png" alt="accountImage" id="loginImage" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small aria-hidden" aria-labelledby="dropdownUser1" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 34px);" data-popper-placement="bottom-end">
                        <li><a class="dropdown-item" href="../webProject/loginPage.php">Accedi</a></li>
                        </ul>
                      </div>
                      </form>
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
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
              <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="text-muted">
              Partita IVA: 0125469874<br>
              Capitale Sociale: 500'000€<br>
              © 2021 D-Sound System Company, Inc<br>
            </span>
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
</html> 
