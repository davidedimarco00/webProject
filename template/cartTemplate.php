        
        <?php if(isset($templateParams["titolo_pagina"])): ?>
        <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
        <?php endif;?>


            <section>
              <div class="col-md-10 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-muted">Il Tuo Carrello</span>
                  <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                

                <aside class="col-lg-9" id="dynamicCart">
                <?php require("getDynamicCart.php"); ?>
                </aside>
              </div>


              <div class="col-md-8 order-md-1">
  
                  <a class="btn btn-primary btn-lg btn-block" type="submit" href="paymentPage.php">Vai al Pagamento</a>
              </div>
            </section>