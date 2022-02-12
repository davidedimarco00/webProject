<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>

<section id="mainSection" style="margin-bottom:700px; margin-top:7%">
    <h1>Ordine Confermato</h1>
    <h3>Grazie per l'acquisto <?php echo $_SESSION["Nickname"]?> !</h3>
    <p>Il pacco verrà spedito a: Via Dell' Università n.50 47521</p>
</section>