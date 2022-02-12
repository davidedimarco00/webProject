        
        <?php if(isset($templateParams["titolo_pagina"])): ?>
        <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
        <?php endif;?>

          <section class="container mt-5 px-5">
            <div class="mb-4">
                <h2>Conferma Ordine e Paga</h2>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card p-3">
                        <h4 class="text-uppercase">Dati Pagamento</h4>

                        <form class="needs-validation" action="process-payment.php" method="POST" enctype="multipart/form-data">
                        <div class="inputbox mt-3"> <input type="text" name="CardNumber" class="form-control" required="required">
                        <div class="invalid-feedback">
                        Please enter a valid Name.
                        </div> <span>Intestatario Carta</span> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2"> <input type="number" name="intestatario" class="form-control" required="required">
                                <div class="invalid-feedback">
                                Please enter a valid Card Number.
                                </div> <i class="fa fa-credit-card"></i> <span>Numero Carta</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-row">
                                    <div class="inputbox mt-3 mr-2"> <input type="number" name="dataS" class="form-control" required="required">
                                    <div class="invalid-feedback">
                                    Please enter a valid Expiry.
                                    </div> <span>Data di Scadenza</span> </div>
                                    <div class="inputbox mt-3 mr-2"> <input type="number" name="cvv" class="form-control" required="required">     
                                    <div class="invalid-feedback">
                                    Please enter a valid CVV.
                                    </div> <span>CVV</span> </div>
                                </div>
                            </div>
                        </div>


                        
                <h4 class="text-uppercase">Indirizzo Fatturazione</h4>
                
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="firstName">Nome</label>
                      <input type="text" class="form-control" name="name" placeholder="" value="" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="lastName">Cognome</label>
                      <input type="text" class="form-control" name="surname" placeholder="" value="" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
                  </div>
                  
      
                  <div class="mb-3">
                    <label>Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" name="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>
      
                  <div class="mb-3">
                    <label>Indirizzo</label>
                    <input type="text" class="form-control" name="address" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>
      
                  <div class="mb-3">
                    <label>Indirizzo 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" name="address2" placeholder="Apartment or suite">
                  </div>
      
                  <div class="row">
                    <div class="col-md-5 mb-3">
                      <label>Stato</label>
                      <select class="custom-select d-block w-100" name="country" required="">
                        <option value="">Scegliere Stato...</option>
                        <?php foreach($templateParams["countries"] as $country):?>
                          <option><?php echo $country ?></option>
                        <?php endforeach; ?>
                        
                        
                      </select>
                      <div class="invalid-feedback">
                        Please select a valid country.
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label>Codice Postale</label>
                      <input type="number" class="form-control" name="zip" placeholder="" required="">
                      <div class="invalid-feedback">
                        Zip code required.
                      </div>
                    </div>
                  </div>
            </div>
              <aside class="mt-4 mb-4 d-flex justify-content-between">
                  <a class="btn btn-secondary btn-lg btn-block" href='cartPage.php'>Torna al Carrello</a>
                  <button class="btn btn-primary btn-lg btn-block" type="submit">Completa il Pagamento</button>
                  </form> 
              </div>
              <div class="col-md-3">
                  <div class="card card-blue p-3 text-black mb-3 bg-light"> <span>IMPORTO</span>
                      <div class="d-flex flex-row align-items-end mb-3">
                          <h1 class="mb-0 black"><?php echo $templateParams["total"]; ?> € </h1>
                      </div> <span></span>
                  </div>
                </div>
              </div>
              </aside>
        </section>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

            <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';

                window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                    }, false);
                });
                }, false);
            })();
            </script>