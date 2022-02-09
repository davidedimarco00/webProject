
<div class="container">
    <h1>Le tue notifiche, <?php echo $_SESSION["Nickname"] ?></h1>
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Numero</th>
            <th scope="col">Data</th>
            <th scope="col">Testo</th>
            <th scope="col" id="actionCol">Azione</th>
            </tr>
        </thead>

        <tbody>
            <tr>
            <?php for($i = 0; $i < count($templateParams["allnotifies"]); $i++): ?>
                <th scope="row"><?php echo $templateParams["allnotifies"][$i]["CodNotifica"]?></th>
                <td><?php echo $templateParams["allnotifies"][$i]["Data"]?></td>
                <td id ="text"><?php echo $templateParams["allnotifies"][$i]["Testo"]?></td>

                <td id="action">
                    <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                </td>
                </tr>
            <?php endfor; ?>
                
        </tbody>

        </table>
    </div>
<script type="text/javascript" src="./javascript/notifies.js"></script>
