    <div class="px-4 my-5 text-left">
        <h1><?php if (isSet($templateParams["title"])){ echo $templateParams["title"]; }?></h1>
    <?php if (empty($templateParams["items"])): ?>
        <h5>Sembra non ci sia nessun prodotto.</h5>
    <?php endif; ?>
        <?php if (isSet($_SESSION["Nickname"]) && getVendorFromList($templateParams["items"]) == $_SESSION["Nickname"] && isUserVendor()): ?>
            <a href="modifyItemPage.php">Aggiungi nuovo prodotto</a>
        <?php endif; ?>
    </div>
    <?php foreach($templateParams["items"] as $current): ?>
        <div class="px-4 my-5 text-left">
            <div class="row">
                <div class="col-lg-4 img">
                    <img class="d-block mx-auto my-auto col-lg-8" src="<?php echo getFirstImage($current["CodProdotto"]); ?>" alt="productImage"></img>
                </div>
                <div class="col-lg-6">
                    <h1 class="display-6"><?php echo $current["Nome"]; ?></h1>
                    <p class="lead mb-2"><?php echo $current["Descrizione"]; ?></p>
                    <p class="lead mb-4">Visita lo store di <a href="listPage.php?vendor=<?php echo $current["Venditore"]; ?>"> <?php echo $current["Venditore"] ?></a> </p>
                    <p class="lead mb-2">Prezzo: <?php echo $current["Prezzo"]; ?>€</p>
                </div>
                <div class="col-lg-2">
                    <?php if(isSet($_SESSION["Nickname"]) && $current["Venditore"] == $_SESSION["Nickname"] && isUserVendor()): ?>
                    <div class="text-center">
                        <a class="btn btn-primary btn-lg px-4 my-2 gap-3" href='modifyItemPage.php?cod=<?php echo $current["CodProdotto"]; ?>'>Modifica</a>
                    </div>
                    <?php endif; ?>
                    <div class="text-center">
                        <a class="btn btn-primary btn-lg px-4 my-2 gap-3" href='productPage.php?cod=<?php echo $current["CodProdotto"]; ?>'>Visualizza</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>