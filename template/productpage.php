        
        <?php if(isset($templateParams["titolo_pagina"])): ?>
        <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
        <?php endif;?>

        <div class="px-4 my-5 text-left">
          <div class="row">
            <div class="col-lg-4">
              <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <?php for($i = 0; $i < count($templateParams["immagini"]); $i++): ?>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $i;?>" class="<?php if($i == 0){ echo "active";}?>" aria-current="true" aria-label="Slide <?php echo $i;?>"></button>
                <?php endfor; ?>
                </div>
                <div class="carousel-inner">
                  <?php for($i = 0; $i < count($templateParams["immagini"]); $i++): ?>
                  <div class="carousel-item <?php if($i == 0){ echo " active";}?>">
                    <img class="d-block mx-auto my-auto" src="<?php echo $templateParams["immagini"][$i];?>" alt="slide <?php echo $i;?>">
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
              <h1 class="display-6"><?php echo $templateParams["nomearticolo"]; ?></h1>
              <p class="lead mb-4">Visita lo store di <?php echo $templateParams["venditore"]; ?></p>
              <p class="lead mb-2">Prezzo: <?php echo $templateParams["prezzo"]; ?>€ & Spedizione a <?php echo $templateParams["spedizione"]; ?> €</p>
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-left">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Acquista Ora</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Aggiungi al Carrello</button>
              </div>
            </div>
          </div>
            <div>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Specifiche Tecniche</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($templateParams["caratteristiche"] as $car): ?>
                  <tr>
                    <th scope="row"><?php echo $car[0]; ?></th>
                    <td><?php echo $car[1]; ?></td>
                  </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
        </div>
