<?php
    require_once "bootstrap.php";

    $cat=$_REQUEST["query"];
    if ($cat != "getnotifies") {
        $dbh->deleteNotify($cat);
        
    }
    $notify=$dbh->getAllNotifies($_SESSION["Nickname"]);
    $inner="";
    foreach($notify as $current){
        $codNotify=$current["CodNotifica"];
        $date=$current["DataNotifica"];
        $text=$current["Testo"];
        
        $inner=$inner.'
        <tr>
            <th scope="row">'.$codNotify.'</th>
            <td>'.$date.'</td>
            <td id ="text">'.$text.'</td>
            <td id="action" class = "deletebtn">
                <button type="button" class="btn btn-danger" onclick="deleteNotify('.$codNotify.')">Elimina</button>
            </td>
        </tr>';
    }
    echo "$inner";
?> 