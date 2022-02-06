        
        <?php if(isset($templateParams["titolo_pagina"])): ?>
        <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
        <?php endif;?>

          <div class="container mt-5 px-5">
            <div class="mb-4">
                <h2>Confirm order and pay</h2>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card p-3">
                        <h4 class="text-uppercase">Payment details</h4>

                        <form class="needs-validation" novalidate="" action="orderConfirmedPage.php">
                        <div class="inputbox mt-3"> <input type="text" name="name" class="form-control" required="required">
                        <div class="invalid-feedback">
                        Please enter a valid Name.
                        </div> <span>Name on card</span> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2"> <input type="number" name="name" class="form-control" required="required">
                                <div class="invalid-feedback">
                                Please enter a valid Card Number.
                                </div> <i class="fa fa-credit-card"></i> <span>Card Number</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-row">
                                    <div class="inputbox mt-3 mr-2"> <input type="number" name="name" class="form-control" required="required">
                                    <div class="invalid-feedback">
                                    Please enter a valid Expiry.
                                    </div> <span>Expiry</span> </div>
                                    <div class="inputbox mt-3 mr-2"> <input type="number" name="name" class="form-control" required="required">     
                                    <div class="invalid-feedback">
                                    Please enter a valid CVV.
                                    </div> <span>CVV</span> </div>
                                </div>
                            </div>
                        </div>


                        
                <h4 class="text-uppercase">Billing address</h4>
                
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="firstName">First name</label>
                      <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="lastName">Last name</label>
                      <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
                  </div>
      
                  <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                      </div>
                      <input type="text" class="form-control" id="username" placeholder="Username" required="">
                      <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                      </div>
                    </div>
                  </div>
      
                  <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>
      
                  <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>
      
                  <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                  </div>
      
                  <div class="row">
                    <div class="col-md-5 mb-3">
                      <label for="country">Country</label>
                      <select class="custom-select d-block w-100" id="country" required="">
                        <option value="">Choose...</option>
                        <option>United States</option>
                      </select>
                      <div class="invalid-feedback">
                        Please select a valid country.
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="state">State</label>
                      <select class="custom-select d-block w-100" id="state" required="">
                        <option value="">Choose...</option>
                        <option>California</option>
                      </select>
                      <div class="invalid-feedback">
                        Please provide a valid state.
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="zip">Zip</label>
                      <input type="number" class="form-control" id="zip" placeholder="" required="">
                      <div class="invalid-feedback">
                        Zip code required.
                      </div>
                    </div>
                  </div>
              </div>

                <div class="col-md-8 order-md-1">

                    </div>
                    <div class="mt-4 mb-4 d-flex justify-content-between">
                        <a class="btn btn-secondary btn-lg btn-block" href='cartPage.php'>Previous step</a>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Complete Payment </button>
                        </form> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-blue p-3 text-black mb-3 bg-light"> <span>You have to pay</span>
                        <div class="d-flex flex-row align-items-end mb-3">
                            <h1 class="mb-0 black"><?php echo $templateParams["total"]; ?> € </h1>
                        </div> <span>Enjoy all the features and perk after you complete the payment</span>
                    </div>
                </div>
            </div>

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