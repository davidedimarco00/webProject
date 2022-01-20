    
    
    <div class="px-4 my-5 text-left">
      <div class="goback">
        <img src="images/arrow-return-left.svg" class="bi bi-arrow-return-left"
          alt=""></img>
        <a href="vendorPage.php" role="button" aria-expanded="false">Torna Indietro</a>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <img class="d-block mx-auto" src="<?php echo $templateParams["item"]["images"][0]; ?>" alt="PrimaryImage" style="height: 400px">
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-left my-2">
            <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Sfoglia Immagine</button>
          </div>
        </div>
        <div class="col-lg-6">
          <h1 class="display-6"><?php echo $templateParams["item"]["name"]; ?></h1>
          <div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Modifica Oggetti</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($templateParams["caratteristiche"] as $cat): ?>
                    <tr>
                        <th scope="row"><?php echo $cat[0]; ?></th>
                        <td><input class="form-control" type="text" placeholder="<?php echo $cat[1]; ?>" aria-label="default input example"></td>
                    </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-right my-2 col-6">
              <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Modifica Categorie</button>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-right my-2 col-6">
              <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Salva</button>
              <button type="button" class="btn btn-outline-secondary btn-lg px-4">Annulla</button>
            </div>
          </div>
        </div>
      </div>
    </div> 
