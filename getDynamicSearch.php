<?php
    require_once "bootstrap.php";

    $string=$_REQUEST["q"];
    $items=$dbh->searchProduct($string);
    $inner="";
    foreach($items as $current){
        $cod=$current["CodProdotto"];
        $inner=$inner.'
      <div class="col-lg-3 justify-content-center mycols">
        <div class="card">
          <img class="card-img-top" src="'.getFirstImage($cod).'" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">'.$current["Nome"].'</h5>
            <p class="card-text">'.$current["Descrizione"].'</p>
            <a href="productPage.php?cod='.$cod.'">Visualizza</a>
          </div>
        </div>
      </div>
      ';
    }
    echo "$inner";
?>