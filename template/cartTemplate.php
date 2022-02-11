        
        <?php if(isset($templateParams["titolo_pagina"])): ?>
        <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
        <?php endif;?>


            <section>
              <div class="col-md-10 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-muted">Your cart</span>
                  <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                

                <aside class="col-lg-9" id="dynamicCart">
                  
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-borderless table-shopping-cart">
                                <thead class="text-muted bg-light">
                                    <tr class="small text-uppercase">
                                        <th scope="col">Product</th>
                                        <th scope="col" width="150">Quantity</th>
                                        <th scope="col" width="150">Price</th>
                                        <th scope="col" width="120"></th>
                                    </tr>
                                </thead>
                                <tbody id="dynamicCart">
                                  <?php foreach($templateParams["items"] as $item): ?>
                                        
                                    <tr>
                                        <td>
                                            <figure class="itemside align-items-center">
                                                <div class="aside"><img src="<?php echo getFirstImage($item["CodProdotto"]); ?>" alt="PrimaryImage" style="height: 180px"></div>
                                                <figcaption class="info"> <a href="productPage.php?cod=<?php echo $item["CodProdotto"]; ?>" class="title text-dark" data-abc="true"><?php echo $item["Nome"]; ?></a>
                                                    <p class="text-muted small">VENDOR: <?php echo $item["Venditore"]; ?><br> CodArticle: <?php echo $item["CodProdotto"]; ?></p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td> <select class="form-control" id="selectQ">
                                            <?php for($k=1;$k<=$item["Quantità"];$k++): ?> 
                                              <?php if($k==$item["quantita"]): ?>
                                                <option selected="selected"><?php echo $k; ?></option>
                                              <?php else: ?>
                                                <option selected="selected"><?php echo $k; ?></option>
                                              <?php endif; ?>
                                            <?php endfor; ?>
                                            </select></td>
                                        <td>
                                            <div class="price-wrap"> <var class="price"><?php echo $item["Prezzo"] * $item["quantita"]; ?> €</var></div>
                                        </td>
                                        <td>
                                          <button type="button" class="btn btn-outline-secondary" id="remove-item" onclick='removefromcart(<?php echo $item["CodProdotto"]; ?>)'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6.5 1a.5.5 0 0 0-.5.5v1h4v-1a.5.5 0 0 0-.5-.5h-3ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1H3.042l.846 10.58a1 1 0 0 0 .997.92h6.23a1 1 0 0 0 .997-.92l.846-10.58Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path>
                                            </svg>
                                            <span class="visually-hidden">Button</span>
                                          </button>
                                        </td>
                                    </tr> 
                                        
                                  <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                    <li class="list-group-item d-flex justify-content-between bg-light visually-hidden">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">-$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong><?php echo $templateParams["total"]; ?>€</strong>
                    </li>
                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Redeem</button>
                            </div>
                        </div>
                    </form>
                </aside>
              </div>


              <div class="col-md-8 order-md-1">
  
                  <a class="btn btn-primary btn-lg btn-block" type="submit" href="paymentPage.php">Continue to Payment </a>
              </div>
            </section>
      
          <!-- Bootstrap core JavaScript
          ================================================== -->
          <!-- Placed at the end of the document so the pages load faster -->
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