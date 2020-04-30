<?php ob_start() ?>

<title>account_activation</title>
<meta name="description" content="se connecter au site Nutrivalen en toutre sécurité..  ">

<?php $meta = ob_get_clean() ?>




<!-------------------------------------->



<?php ob_start() ?>


 <section class="account_confirmation_section">
    
    <div class="account_confirmation_div">
      <p>Mes féliicitation , vous avez créé votre compte pro avec succés ! </p>
       <p>dès à présent vous pouvez vous connectez à votre espace personnel</p>
       <p>just en <a href ="index.php?class=user&action=login" >cliquant ici</a></p>
       <p class="note">Note: si vous n'arrivez pas encore à vous connecter , réactualisez la page ou recliquez sur le lien dans votre boite mail; merci ! </p>
    </div>
 </section>








<?php $content= ob_get_clean() ?>




<!-------------------------------------->


<?php require "views/layout.php" ?>
