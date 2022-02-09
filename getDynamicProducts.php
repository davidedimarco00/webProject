<?php
    require_once "bootstrap.php";

    $cat=$_REQUEST["q"];
    if ($cat == "all"){
        $items=$dbh->getRandomProducts(100);
    }
    else{
        $items=$dbh->getProductsByCategory($cat);
    }
    $inner="";
    foreach($items as $current){
        $nome=$current["Nome"];
        $cod=$current["CodProdotto"];
        $img=getFirstImage($cod);
        $desc=$current["Descrizione"];
        $inner=$inner.'
      <div class="col-lg-3 justify-content-center mycols">
        <div class="card">
          <img class="card-img-top" src="'.$img.'" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">'.$nome.'</h5>
            <p class="card-text">'.$desc.'</p>
            <a href="productPage.php?cod='.$cod.'">Visualizza</a>
          </div>
        </div>
      </div>
      ';
    }
    echo "$inner";
?>