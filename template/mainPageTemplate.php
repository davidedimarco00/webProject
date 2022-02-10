  <?php if(isSet($_GET["formmsg"])): ?>
  <div class="error">
      <h5>Attenzione!</h5>
      <p><?php echo $_GET["formmsg"]; ?></p>
  </div>
  <?php endif; ?>
  <!--   CAROUSEL     ---->
  <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators">
  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
  <div class="carousel-item active">
    <img src="images/mixerCOVER.jpg" class="d-block w-100" alt="...">
    <div class="carousel-caption d-none d-md-block">
      <h5>MIXER</h5>
      <p>I migliori mixer per l'equalizzazione dei tuoi brani preferiti a prezzi super vantaggiosi!</p>
    </div>
  </div>
  <div class="carousel-item">
    <img src="images/speakerCOVER.jpg" class="d-block w-100" alt="...">
    <div class="carousel-caption d-none d-md-block">
      <h5>Speaker bluethoot</h5>
      <p>Addio a prolunghe e cavi, l'unico mezzo necessario? L'aria.</p>
    </div>
  </div>
  <div class="carousel-item">
    <img src="images/subwooferCOVER.jpg" class="d-block w-100" alt="...">
    <div class="carousel-caption d-none d-md-block">
      <h5>Subwoofer</h5>
      <p>Quel basso che ti fa vibrare dentro, il cuore e la mente. Non esiste brano senza un basso in grado di emozionarti!</p>
    </div>
  </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Next</span>
  </button>
  </div>
  <!------ ALBUM PRODOTTI----->


  <div class="container">
      <div class="row">
        <div class="col-lg-3 justify-content-center mycols">
          <div class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" id="searchbar" placeholder="Search" aria-label="Search">
          </div>
          <div class="list-group" id="list-tab" role="presentation">
            <button class="list-group-item list-group-item-action mx-auto" id="list-home-list" data-toggle="list" onclick="dynamicProduct('all')" role="tab" aria-controls="home">Tutto</a>
          <?php foreach($templateParams["categories"] as $id => $value): ?> 
            <button class="list-group-item list-group-item-action mx-auto" id="list-home-list" data-toggle="list" onclick="dynamicProduct(<?php echo $value['CodCategoria']; ?>)" role="tab" aria-controls="home"><?php echo $value['Nome']?></a>  
          <?php endforeach;?>
          </div>
        </div>
        <div id="dynamicByCategory" class="row col-lg-9">
        <?php foreach($templateParams["items"] as $current): ?>
          <div class="col-lg-3 justify-content-center mycols">
            <div class="card" id="card">
              <img class="card-img-top" src="<?php echo getFirstImage($current["CodProdotto"]); ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $current["Nome"];?></h5>
                <p class="card-text"><?php echo $current["Descrizione"];?></p>
                <a href="productPage.php?cod=<?php echo $current["CodProdotto"]; ?>">Visualizza</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
  </div>
