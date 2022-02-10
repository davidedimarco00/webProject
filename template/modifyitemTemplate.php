    <?php $item=$templateParams["item"]; ?>
    <form action="process-product.php" method="POST" enctype="multipart/form-data">
      <div class="px-4 my-5 text-left">
        <div class="goback">
          <img src="images/arrow-return-left.svg" class="bi bi-arrow-return-left"
            alt=""></img>
          <a href="index.php" role="button" aria-expanded="false">Torna Indietro</a>
        </div>
        <div class="row">            
          <div class="col-lg-12">
          <?php if (isSet($templateParams["item"]["Nome"])): ?>
            <h1 class="display-6"><?php echo $templateParams["item"]["Nome"]; ?></h1>
          <?php else: ?>
            <h1 class="display-6">Inserisci Nuovo Elemento</h1>
          <?php endif;?>
          </div>
          <div class="col-lg-3">
            <div class="row">
              <img class="d-block mx-auto my-auto" src="<?php echo getFirstImage($item["CodProdotto"]) ?>" alt="PrimaryImage">
            </div>
            <div class="row">
                <input name="images[]" type="file" multiple="true" />
            </div>
          </div>
          <div class="col-lg-9">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Modifica</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Nome:</th>
                  <td><input type="text" class="form-control" id="Nome" name="Nome" value="<?php echo $templateParams["item"]["Nome"]; ?>"></td>
                </tr>
                <tr>
                  <th scope="row">Descrizione:</th>
                  <td><input type="text" class="form-control" id="Descrizione" name="Descrizione" value="<?php echo $templateParams["item"]["Descrizione"]; ?>"></td>
                </tr>
                <tr>
                  <th scope="row">Prezzo:</th>
                  <td><input type="text" class="form-control" id="Prezzo" name="Prezzo" value="<?php echo $templateParams["item"]["Prezzo"]; ?>"></td>
                </tr>
                <tr>
                  <th scope="row">Quantità:</th>
                  <td><input type="text" class="form-control" id="Quantità" name="Quantità" value="<?php echo $templateParams["item"]["Quantità"]; ?>"></td>
                </tr>
                <tr>
                  <th scope="row">Categoria</th>
                  <td><select class="custom-select" id="categorySelection" name="category">
                  <option selected value=-1>Choose...</option>
                  <?php for($i=0; $i<count($templateParams["categories"]); $i++): ?>
                  <option value="<?php echo $templateParams["categories"][$i]["CodCategoria"]; ?>"><?php echo $templateParams["categories"][$i]["Nome"]; ?></option>
                  <?php endfor; ?>
                  </select></td>
                </tr>
              </tbody>
            </table>
            <?php if ($templateParams["action"] == 1 && hasImages($templateParams["item"]["CodProdotto"])): ?>
                <div class="row">
                  <div class="col-lg-3">
                    <h5>Seleziona le immagini da eliminare: </h5>
                  </div>
                <?php for($i=0; $i<count($templateParams["item"]["images"]); $i++): ?>
                  <?php $img=$templateParams["item"]["images"][$i]; ?>
                  <div class="col-lg-1">
                    <input type="checkbox" id="<?php echo "$i"; ?>" name="<?php echo "$i"; ?>" />
                    <div class="miniature">
                      <img class="d-block mx-auto my-auto miniature" src="<?php echo "$img"; ?>" alt="">
                    </div>
                  </div>
                <?php endfor; ?>
                </div>
            <?php endif; ?>
          </div>
          <div class="row">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-right my-2 col-6">
              <input type="submit" name="submit" value="Conferma" class="btn btn-primary btn-lg px-4 gap-3"></input>
              <?php if ($templateParams["action"] == 1): ?>
              <input type="submit" name="submit" value="Elimina Prodotto" class="btn btn-primary bg-danger btn-lg px-4 gap-3"></input>
              <?php endif; ?>
              <a class="btn btn-outline-secondary btn-lg px-4" href="index.php">Annulla</a>
            </div>
          </div>
        </div>
      </div> 
      <input name="action" type="hidden" value="<?php echo $templateParams["action"] ?>" />
      <?php if(isSet($_GET["cod"])): ?>
        <input name="codProdotto" type="hidden" value="<?php echo $_GET["cod"]; ?>" />
      <?php endif; ?>
    </form>
