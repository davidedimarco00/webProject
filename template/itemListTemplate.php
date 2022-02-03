        
        
    <?php foreach($templateParams["items"] as $current): ?>
        <div class="px-4 my-5 text-left">
            <div class="row">
                <div class="col-lg-4">
                    <img class="d-block mx-auto my-auto" src="<?php echo getFirstImage($current["CodProdotto"]); ?>" width="300px"> <!-- TODO -->
                </div>
                <div class="col-lg-6">
                    <h1 class="display-6"><?php echo $current["Nome"]; ?></h1>
                    <p class="lead mb-2"><?php echo $current["Descrizione"]; ?></p>
                    <p class="lead mb-4">Visita lo store di <?php echo ""; ?></p>
                    <p class="lead mb-2">Prezzo: <?php echo $current["Prezzo"]; ?>€ & Spedizione a <?php echo "0"; ?> €</p>
                </div>
                <?php if(isUserVendor()): ?>
                <div class="col-lg-2">
                    <a class="btn btn-primary btn-lg px-4 gap-3" href='modifyItemPage.php?cod=<?php echo $current["CodProdotto"]; ?>'>Modifica</a>
                </div>
                <?php endif; ?>
                <?php if(!isUserVendor()): ?>
                <div class="col-lg-2">
                    <a class="btn btn-primary btn-lg px-4 gap-3" href='productPage.php?cod=<?php echo $current["CodProdotto"]; ?>'>Visualizza</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>