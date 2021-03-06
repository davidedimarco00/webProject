<?php
    require_once "bootstrap.php";
    if(!isUserLoggedIn()){
        header("Location: loginPage.php?formmsg='È necessario effettuare il login'");
    }
    $CodCarrello=$dbh->getCart($_SESSION["Nickname"]);
    if(isSet($_REQUEST["q"]) && isSet($_REQUEST["c"])){
        if($dbh->productInStock($_REQUEST["c"], $_REQUEST["q"]) && $_REQUEST["q"]>0){
            $dbh->updateProductInCart($CodCarrello, $_REQUEST["c"], $_REQUEST["q"]);
        }
    }
    else if(isSet($_REQUEST["d"])){
        $dbh->deleteCartProduct($CodCarrello, $_REQUEST["d"]);
    }
    $tot=$dbh->totalPrice($CodCarrello);
    //Qua sotto ottengo gli oggetti e li ricarico dinamicamente nella pagina cartpage
    $items=$dbh->getCartItems($CodCarrello);
    $inner='
        <div class="card">
            <div class="table-responsive">
                <table class="table table-borderless table-shopping-cart">
                    <thead class="text-muted bg-light">
                        <tr class="small text-uppercase">
                            <th scope="col">Prodotto</th>
                            <th scope="col" width="150">Quantità</th>
                            <th scope="col" width="150">Prezzo</th>
                            <th scope="col" width="120"></th>
                        </tr>
                    </thead>
                    <tbody>';
    foreach($items as $current){
        $cod=$current["CodProdotto"];
        $reqQuant=$dbh->getCartItem($CodCarrello, $cod)["quantita"];
        $inner.='
                        <tr>
                            <td>
                                <figure class="itemside align-items-center">
                                    <div class="aside"><img src="'.getFirstImage($current["CodProdotto"]).'" alt="PrimaryImage" style="max-height: 180px; max-width: 300px"></div>
                                    <figcaption class="info"> <a href="productPage.php?cod='.$current["CodProdotto"].'" class="title text-dark" data-abc="true">'.$current["Nome"].'</a>
                                        <p class="text-muted small">VENDITORE: '.$current["Venditore"].'<br> CodArticolo: '.$current["CodProdotto"].'</p>
                                    </figcaption>
                                </figure>
                            </td>
                            <td>
                                <div class="row">
                                    <button class="btn btn-outline-secondary col-md-3" type="button" id="minus" onclick="updatecart('.(string)($current["quantita"]-1).','.$current["CodProdotto"].')">-</button>
                                    <span class="input-group-text col-md-3">'.$current["quantita"].'</span>
                                    <button class="btn btn-outline-secondary col-md-3" type="button" id="plus" onclick="updatecart('.(string)($current["quantita"]+1).','.$current["CodProdotto"].')">+</button>
                                </div>';
                    $inner.='
                            </td>
                            <td>
                                <div class="price-wrap"> <var class="price">'.$reqQuant * $current["Prezzo"].'€</var></div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary" id="remove-item" onclick="removefromcart('.$current["CodProdotto"].')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6.5 1a.5.5 0 0 0-.5.5v1h4v-1a.5.5 0 0 0-.5-.5h-3ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1H3.042l.846 10.58a1 1 0 0 0 .997.92h6.23a1 1 0 0 0 .997-.92l.846-10.58Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path>
                                    </svg>
                                    <span class="visually-hidden">Button</span>
                                </button>
                            </td>
                        </tr>
                        ';
    }
    $inner.='
                    </tbody>
                </table>
            </div>
        </div>
        <li class="list-group-item d-flex justify-content-between">
            <span>Totale</span>
            <strong>'.$tot.'€</strong>
        </li>
            ';
    echo "$inner";
?>