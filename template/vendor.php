        
        
    <?php foreach($templateParams["items"] as $item): ?>
        <div class="px-4 my-5 text-left">
            <div class="row">
            <div class="col-lg-3">
                    <img class="d-block mx-auto" src="<?php echo $item["images"][0]; ?>" alt="PrimaryImage" style="height: 400px">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-6"><?php echo $item["name"]; ?></h1>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-left">
                        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Modifica</button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Rimuovi</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
