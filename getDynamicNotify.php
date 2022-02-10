<?php
    require_once "bootstrap.php";

    $cat=$_REQUEST["query"];
    if ($cat == "getnotifies") {
        $notify=$dbh->getAllNotifies($_SESSION["Nickname"]);
        $inner="";
        foreach($notify as $current){
            $codNotify=$current["CodNotifica"];
            $date=$current["Data"];
            $text=$current["Testo"];
            
            $inner=$inner.'
            <tr>
                <th scope="row">'.$codNotify.'</th>
                <td>'.$date.'</td>
                <td id ="text">'.$text.'</td>
                <td id="action" class = "deletebtn">
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
            </tr>';
        }
        echo "$inner";
    }
?> 