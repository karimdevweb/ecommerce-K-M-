<?php ob_start() ?>

<title>paiement</title>
<meta name="description" content="payer en toute sécurité...  ">

<?php $meta = ob_get_clean() ?>





<!-------------------------------------->

<!-------------------------------------->





<?php ob_start() ?>



<form action="index.php?class=orders&action=paiement" method="post">
<fieldset>
    <input type="text" name="LastName" placeholder="votre nom">
</fieldset>
<fieldset>
    <input type="text" name="firstName" placeholder="votre prenom">
</fieldset>
<fieldset>
    <input type="text" name="address" placeholder="votre adresse">
    <input type="text" name="address2" placeholder="autre adresse">
</fieldset>
<input type="submit" name="payer" value="étape suivante =>">
</form>

<?php $content = ob_get_clean() ?>


<?php require "views/layout.php" ?>







