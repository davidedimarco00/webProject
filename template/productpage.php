<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
    <?php endif;?>

    <div class="px-4 my-5 text-left">
      <div class="row">
        <div class="col-lg-4">
          <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block mx-auto my-auto" src="../images/mixer.jpg" alt="1 slide">
              </div>
              <div class="carousel-item">
                <img class="d-block mx-auto my-auto" src="../images/mixer2.jpg" alt="2 slide">
              </div>
              <div class="carousel-item">
                <img class="d-block mx-auto my-auto" src="../images/mixer3.jpg" alt="3 slide">
              </div>
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
          <p class="lead mb-2">Prezzo: <?php echo $templateParams["prezzo"]; ?>€ & <?php echo $templateParams["spedizione"]; ?></p>
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
              <tr>
                <th scope="row">numero di uscite</th>
                <td>8 uscite</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>placeholder</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>placeholder</td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>





        <article>
            <header>
                <div>
                    <img src="<?php echo UPLOAD_DIR.$articolo["imgarticolo"]; ?>" alt="" />
                </div>
                <h2><?php echo $articolo["titoloarticolo"]; ?></h2>
                <p><?php echo $articolo["dataarticolo"]; ?> - <?php echo $articolo["nome"]; ?></p>
            </header>
            <section>
                <p><?php echo $articolo["anteprimaarticolo"]; ?></p>
            </section>
            <footer>
                <a href="articolo.php?id=<?php echo $articolo["idarticolo"]; ?>">Leggi tutto</a>
            </footer>
        </article> 
