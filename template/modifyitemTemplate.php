    <?php $item=$templateParams["item"]; ?>
    <form action="process-product.php" method="POST" enctype="multipart/form-data">
      <div class="px-4 my-5 text-left">
        <div class="goback">
          <img src="images/arrow-return-left.svg" class="bi bi-arrow-return-left"
            alt=""></img>
          <a href="vendorPage.php" role="button" aria-expanded="false">Torna Indietro</a>
        </div>
        <div class="row">            
          <div class="col-lg-9">
          <?php if (isSet($templateParams["item"]["Nome"])): ?>
            <h1 class="display-6"><?php echo $templateParams["item"]["Nome"]; ?></h1>
          <?php else: ?>
            <h1 class="display-6">Inserisci Nuovo Elemento</h1>
          <?php endif;?>
            <div>
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
                        <th scope="row">Categoria</th>
                        <td><select class="custom-select" id="categorySelection" name="category">
                        <option selected value=-1>Choose...</option>
                        <?php for($i=1; $i<count($templateParams["categories"]); $i++): ?>
                        <option value="<?php echo $templateParams["categories"][$i]["CodCategoria"]; ?>"><?php echo $templateParams["categories"][$i]["Nome"]; ?></option>
                        <?php endfor; ?>
                        </select></td>
                    </tr>

                  </tbody>
              </table>
            </div>
            <div class="row">
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-right my-2 col-6">
                <input type="submit" name="submit" class="btn btn-primary btn-lg px-4 gap-3"></input>
                <button class="btn btn-outline-secondary btn-lg px-4" href="index.php">Annulla</button>
              </div>
            </div>
          </div>
          <img class="d-block mx-auto my-auto col-lg-3" src="<?php echo getFirstImage($item["CodProdotto"]) ?>" alt="PrimaryImage"> <!--TODO -->
        </div>
        <div class="row"> 
          <input name="images[]" type="file" multiple="true" />
        </div>
        
      </div> 
      <input name="action" type="hidden" value="<?php echo $templateParams["action"] ?>" />
            <?php if(isSet($_GET["cod"])): ?>
                <input name="codProdotto" type="hidden" value="<?php echo $_GET["cod"]; ?>" />
            <?php endif; ?>
    </form>
