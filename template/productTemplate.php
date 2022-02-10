        
        <?php $current = $templateParams["item"]; ?>
        <div class="px-4 my-5 text-left">
          <div class="row">
            <div class="col-lg-4">
              <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <?php for($i = 0; $i < count($current["images"]); $i++): ?>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $i;?>" class="<?php if($i == 0){ echo "active";}?>" aria-current="true" aria-label="Slide <?php echo $i;?>"></button>
                <?php endfor; ?>
                </div>
                <div class="carousel-inner">
                  <?php for($i = 0; $i < count($current["images"]); $i++): ?>
                  <div class="carousel-item <?php if($i == 0){ echo " active";}?>">
                    <img class="d-block mx-auto my-auto" src="<?php echo $current["images"][$i];?>" alt="slide <?php echo $i;?>">
                  </div>
                  <?php endfor; ?>
                </div>


                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            <div class="col-lg-8">
              <h1 class="display-6"><?php echo $current["Nome"]; ?></h1>
              <h5><?php echo $current["Descrizione"]; ?></h5>
              <div class="row">
                <a class="mb-4" href="listPage.php?vendor=<?php echo $current["Venditore"]; ?>">Visita lo store di <?php echo $current["Venditore"]; ?></a>
              </div>
              <div class="row">
                <a class="mb-4" href="listPage.php?cat=<?php echo $current["CodCategoria"]; ?>">Visualizza altri prodotti della categoria <?php echo $dbh->getCategoryName($current["CodCategoria"]); ?></a>
              </div>
              <p class="lead mb-2">Prezzo: <?php echo $current["Prezzo"]; ?>€</p>
              <?php if ($current["Quantità"] <= 0): ?>
                <p class="text-danger">Sold Out!</p>
              <?php endif; ?>
              <?php if ($current["Quantità"] > 0 && $current["Quantità"] < 3): ?>
                <p class="text-danger">In esaurimento!</p>
              <?php endif; ?>
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-left">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Acquista Ora</button>
                <a type="button" class="btn btn-outline-secondary btn-lg px-4" onclick='addtocart(<?php echo $current["CodProdotto"];?>)'>Aggiungi al Carrello</a>
                <?php if (isSet($_SESSION["Nickname"]) && $current["Venditore"] == $_SESSION["Nickname"] && isUserVendor()): ?>
                <a type="button" class="btn btn-primary bg-danger btn-lg px-4 gap-3" href="modifyItemPage.php?cod=<?php echo $current["CodProdotto"]; ?>">Modifica</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
