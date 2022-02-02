    
    
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
          <h1 class="display-6"><?php echo $templateParams["item"]["Nome"]; ?></h1>
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
                      <td></td>
                  </tr>
                  <tr>
                      <th scope="row">Descrizione:</th>
                      <td></td>
                  </tr>
                  <tr>
                      <th scope="row">Prezzo:</th>
                      <td></td>
                  </tr>
                  <tr>
                      <th scope="row">Categoria</th>
                      <td><select class="custom-select" id="categorySelection">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      </select></td>
                  </tr>

                </tbody>
            </table>
          </div>
          <div class="row">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-right my-2 col-6">
              <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Salva</button>
              <button type="button" class="btn btn-outline-secondary btn-lg px-4">Annulla</button>
            </div>
          </div>
        </div>
      </div>
    </div> 
