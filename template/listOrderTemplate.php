<?php if (empty($templateParams["orders"])): ?>
    <div class="px-4 my-5 text-left">
        <h5>Nessun ordine effettuato</h5>
    </div>
<?php endif; ?>
<?php foreach($templateParams["orders"] as $current): ?>
    <?php $items=$dbh->getCartItems($current["CodCarrello"]); ?>
    <div class="px-4 my-5 text-left">
        <h1>Ordine del <?php echo $current["Data"].', '.$current["Stato"]; ?></h1>
    </div>
    <?php foreach($items as $item): ?>
        <div class="px-4 my-5 text-left">
            <div class="row">
                <div class="col-lg-4 img">
                    <img class="d-block mx-auto my-auto col-lg-8" src="<?php echo getFirstImage($item["CodProdotto"]); ?>" alt="productImage"></img>
                </div>
                <div class="col-lg-6">
                    <h1 class="display-6"><?php echo $item["Nome"]; ?></h1>
                    <p class="lead mb-2"><?php echo $item["Descrizione"]; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>
